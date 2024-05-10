BX.addCustomEvent("formCustomHandlers", formCustomHandlers);

function formCustomHandlers (eventdata) 
{
  $date = $("input#POPUP_DATE");

  if (typeof(dateTimePickerInit) !== 'function' || $date.data('datetimepicker')) return;

  let datetimepickerParams = {  
    	minView: 2,   
	};


  dateTimePickerInit(datetimepickerParams, '.form form input.date');

  $contacts = document.querySelector("select#POPUP_CONTACTS");

  if($contacts){

    document.querySelector('input[data-sid = "CONTACT_ID"]').value = document.querySelector("select#POPUP_CONTACTS option:checked").dataset.id;

    $contacts.addEventListener('change', function (e) {
      document.querySelector('input[data-sid = "CONTACT_ID"]').value = this.selectedOptions[0].dataset.id;
      getRecordTime(this)
    });

    $date.on('change', function (e) {
      getRecordTime(this);
    });

    function getRecordTime(note)
    {
      BX.ajax.runAction(
        'aspro:allcorp3motor.Form.getRecordTime',
        {
          data: {
              CONTACT_ID: note.closest('form').querySelector("select#POPUP_CONTACTS option:checked").dataset.id,
              FORM_CODE: note.closest("form").name,
              DATE: note.closest('form').querySelector('input[data-sid = "DATE"]').value,
              SERVICE_ID: note.closest("form").querySelector('input[data-sid="SERVICE_ID"]').value,
          }
        }
      ).then(function (response) {  
        const $select = document.querySelector("select#POPUP_RECORD_TIME");

        $select.innerHTML = response.data.map((time, index) => '<option value="' + time.VALUE + '" data-id="' + index + '" '+ time.DISABLED +'>' + time.VALUE + '</option>');

        selectValue = response.data.filter((time, index) => !time.DISABLED);

        $select.value = selectValue[0].VALUE;
      },function (response) {
        console.error(response);
      });
    }
  }
}

$.validator.addMethod(
  "checkFreeTime",
  function (value, element, params) {
    return $.validator.methods.remote.call(this, value, element, {
      url: `/bitrix/services/main/ajax.php?action=aspro%3Aallcorp3motor.Form.checkFreeTime`,
      type: "post",
      data: {
        SERVICE_ID: $(element).closest("form").find('input[data-sid="SERVICE_ID"]').val(),
        CONTACT_ID: $(element).closest("form").find('input[data-sid = "CONTACT_ID"]').val(),
        DATE: $(element).closest("form").find('input[data-sid = "DATE"]').val(),
        RECORD_TIME: value,
        FORM_CODE: $(element).closest("form").attr('name'),
      },
    });
  },
  BX.message("JS_TIME_BUSY")
);

$.extend($.validator.messages, {
  remote: BX.message("JS_TIME_BUSY"),
});

$.validator.addClassRules({
  checkFreeTime: {
    checkFreeTime: "",
  },
});