/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

Inventory_Edit_Js("SalesOrder_Edit_Js",{},{
    
    
    /**
	 * Function to get popup params
	 */
	getPopUpParams : function(container) {
		var params = this._super(container);
        var sourceFieldElement = jQuery('input[class="sourceField"]',container);
		if(!sourceFieldElement.length) {
			sourceFieldElement = jQuery('input.sourceField',container);
		}

		if(sourceFieldElement.attr('name') == 'contact_id' || sourceFieldElement.attr('name') == 'potential_id') {
			var form = this.getForm();
			var parentIdElement  = form.find('[name="account_id"]');
			if(parentIdElement.length > 0 && parentIdElement.val().length > 0 && parentIdElement.val() != 0) {
				var closestContainer = parentIdElement.closest('td');
				params['related_parent_id'] = parentIdElement.val();
				params['related_parent_module'] = closestContainer.find('[name="popupReferenceModule"]').val();
			} else if(sourceFieldElement.attr('name') == 'potential_id') {
				parentIdElement  = form.find('[name="contact_id"]');
				if(parentIdElement.length > 0 && parentIdElement.val().length > 0) {
					closestContainer = parentIdElement.closest('td');
					params['related_parent_id'] = parentIdElement.val();
					params['related_parent_module'] = closestContainer.find('[name="popupReferenceModule"]').val();
				}
			}
        }
        return params;
    },
    
    /**
	 * Function to register event for enabling recurrence
	 * When recurrence is enabled some of the fields need
	 * to be check for mandatory validation
	 */
	registerEventForEnablingRecurrence : function(){
		var thisInstance = this;
		var form = this.getForm();
		var enableRecurrenceField = form.find('[name="enable_recurring"]');
		var fieldNamesForValidation = new Array('recurring_frequency','start_period','end_period','payment_duration','invoicestatus');
        var selectors = new Array();
        for(var index in fieldNamesForValidation) {
            selectors.push('[name="'+fieldNamesForValidation[index]+'"]');
        }
        var selectorString = selectors.join(',');
        var validationToggleFields = form.find(selectorString);
		enableRecurrenceField.on('change',function(e){
			var element = jQuery(e.currentTarget);
			var addValidation;
			if(element.is(':checked')){
				addValidation = true;
			}else{
				addValidation = false;
			}
			
			//If validation need to be added for new elements,then we need to detach and attach validation
			//to form
			if(addValidation){
				thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
			}else{
				thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
			}
		})
		if(!enableRecurrenceField.is(":checked")){
			thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, false);
		}else if(enableRecurrenceField.is(":checked")){
			thisInstance.AddOrRemoveRequiredValidation(validationToggleFields, true);
		}
	},
	
	AddOrRemoveRequiredValidation : function(dependentFieldsForValidation, addValidation) {
		jQuery(dependentFieldsForValidation).each(function(key,value){
			var relatedField = jQuery(value);
			if(addValidation) {
				relatedField.removeClass('ignore-validation').data('rule-required', true);
				if(relatedField.is("select")) {
					relatedField.attr('disabled',false);
				}else {
					relatedField.removeAttr('disabled');
				}
			} else if(!addValidation) {
				relatedField.addClass('ignore-validation').removeAttr('data-rule-required');
				if(relatedField.is("select")) {
					relatedField.attr('disabled',true).trigger("change");
					var select2Element = app.helper.getSelect2FromSelect(relatedField);
					select2Element.trigger('Vtiger.Validation.Hide.Messsage');
					select2Element.find('a').removeClass('input-error');
				}else {
					relatedField.attr('disabled','disabled').trigger('Vtiger.Validation.Hide.Messsage').removeClass('input-error');
				}
			}
		});
	},
    
    /**
	 * Function to search module names
	 */
	searchModuleNames : function(params) {
        var aDeferred = jQuery.Deferred();
		if(typeof params.module == 'undefined') {
			params.module = app.getModuleName();
		}
		if(typeof params.action == 'undefined') {
			params.action = 'BasicAjax';
		}
		
		if(typeof params.base_record == 'undefined') {
			var record = jQuery('[name="record"]');
			var recordId = app.getRecordId();
			if(record.length) {
				params.base_record = record.val();
			} else if(recordId) {
				params.base_record = recordId;
			} else if(app.view() == 'List') {
				var editRecordId = jQuery('#listview-table').find('tr.listViewEntries.edited').data('id');
				if(editRecordId) {
					params.base_record = editRecordId;
				}
			}
		}
        
        // Added for overlay edit as the module is different
        if(params.search_module == 'Products' || params.search_module == 'Services') {
            params.module = 'SalesOrder';
        }

		app.request.get({'data':params}).then(
			function(error, data){
                if(error == null) {
                    aDeferred.resolve(data);
                }
			},
			function(error){
				aDeferred.reject();
			}
		)
		return aDeferred.promise();
    },
    
    /**
	 * Function which will register event for Reference Fields Selection
	 */
	registerReferenceSelectionEvent : function(container) {
		this._super(container);
		var self = this;

		jQuery('input[name="account_id"]', container).on(Vtiger_Edit_Js.referenceSelectionEvent, function(e, data){
			self.referenceSelectionEventHandler(data, container);
		});
	},
        registerBasicEvents: function(container){
            this._super(container);
            this.registerEventForEnablingRecurrence();
            this.registerForTogglingBillingandShippingAddress();
            this.registerEventForCopyAddress();
        },
        
        registerCreateProduct : function() {
	 	var thisInstance = this;
	 	$(document).on("click","#createnewproduct",function(e,params){
	 		var quickCreateElem = jQuery(e.currentTarget);
	 		var quickCreateUrl = quickCreateElem.data('url');
	 		var quickCreateModuleName = quickCreateElem.data('name');
	 		if (typeof params === 'undefined') {
	 			params = {};
	 		}
	 		app.helper.showProgress();
	 		thisInstance.getQuickCreateForm(quickCreateUrl,quickCreateModuleName,params).then(function(data){
	 			app.helper.hideProgress();
	 			var callbackparams = {
	 				'cb' : function (container){
	 					thisInstance.registerPostReferenceEvent(container);
	 					app.event.trigger('post.QuickCreateForm.show',form);
	 					app.helper.registerLeavePageWithoutSubmit(form);
	 					app.helper.registerModalDismissWithoutSubmit(form);
	 				},
	 				backdrop : 'static',
	 				keyboard : false
	 			}

	 			app.helper.showModal(data, callbackparams);
	 			var form = jQuery('form[name="QuickCreate"]');
	 			var moduleName = form.find('[name="module"]').val();
	 			app.helper.showVerticalScroll(jQuery('form[name="QuickCreate"] .modal-body'), {'autoHideScrollbar': true});

	 			var targetInstance = thisInstance;
	 			var moduleInstance = Vtiger_Edit_Js.getInstanceByModuleName(moduleName);
	 			if(typeof(moduleInstance.quickCreateSave) === 'function'){
	 				targetInstance = moduleInstance;
	 				targetInstance.registerBasicEvents(form);
	 			}

	 			vtUtils.applyFieldElementsView(form);
	 			targetInstance.quickCreateSave(form,params);
	 			app.helper.hideProgress();
	 			app.event.one('post.QuickCreateForm.save',function(event,data){
	 				app.helper.showConfirmationBox({'message' : 'Add the Created Product in LineItem..?'}).then(
	 					function(e) {
	 						var checkflag = false;
	 						jQuery( "#lineItemTab tbody tr.lineItemRow" ).each(function( index ) {
	 							if($('#hdnProductId'+(index+1)).val() == '' && checkflag == false){
	 								checkflag = true;
	 							}
	 						});
	 						if(checkflag == false){
	 							$('#addProduct').trigger('click');
	 						}
	 						jQuery( "#lineItemTab tbody tr.lineItemRow" ).each(function( index ) {
	 							if($('#hdnProductId'+(index+1)).val() == ''){
	 								var dataUrl = "index.php?module=Inventory&action=GetTaxes&record="+data._recordId+"&currency_id="+jQuery('#currency_id option:selected').val()+"&sourceModule=SalesOrder";
	 								var element = jQuery( "#lineItemTab tbody tr#row"+ (index+1));
	 								app.request.get({'url':dataUrl}).then(
	 									function(error, data){
	 										if(error == null) {
	 											var itemRow = thisInstance.getClosestLineItemRow(element);
	 											itemRow.find('.lineItemType').val('Products');
	 											thisInstance.mapResultsToFields(itemRow, data[0]);
	 										}
	 									},
	 									function(error,err){

	 									}
	 									);
	 							}							 	
	 						});
	 					},
	 					function(error, err){
	 					}
	 					);
	 			});
	 		});
	 	});
	 },
	    getQuickCreateForm: function(url, moduleName, params) {
    	 	var aDeferred = jQuery.Deferred();
    	 	var requestParams = app.convertUrlToDataParams(url);
    	 	jQuery.extend(requestParams, params.data);
    	 	app.request.post({data:requestParams}).then(function(err,data) {
    	 		aDeferred.resolve(data);
	 	});
	 	return aDeferred.promise();
	 },
	 getClosestLineItemRow : function(element){
	 	return element.closest('tr.'+this.lineItemDetectingClass);
	 },
	 registerBasicEvents: function(container){
	 	this._super(container);
	 	this.registerEventForEnablingRecurrence();
	 	this.registerForTogglingBillingandShippingAddress();
	 	this.registerEventForCopyAddress();
	 	this.registerCreateProduct();
	 },
    
});