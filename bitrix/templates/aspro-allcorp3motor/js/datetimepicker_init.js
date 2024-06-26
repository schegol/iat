function dateTimePickerInit(params, select = '.form form input.datetime') {
  let dateFormat = 'dd:mm:yyyy hh:ii';
  switch (arAllcorp3Options["THEME"]["DATE_FORMAT"]) {
    case "DOT":
      dateFormat = "dd.mm.yyyy hh:ii";
      break;
    case "HYPHEN":
      dateFormat = "dd-mm-yyyy hh:ii";
      break;
    case "SPACE":
      dateFormat = "dd mm yyyy hh:ii";
      break;
    case "SLASH":
      dateFormat = "dd/mm/yyyy hh:ii";
      break;
  }

  const $datetime = $(select);
  $datetime.on("click", function (e) {
    e.stopPropagation();
  });

  params = $.extend(
    {
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
      format: dateFormat,
      autoclose: true,
      language: "ru",
      keyboardNavigation: false,
    },
    params
  );
  $datetime.datetimepicker(params).on("changeDate", function (ev) {
    $(ev.currentTarget).closest(".form-group").addClass("input-filed");
  });

  const field = $datetime.closest(".form-group");
  if (field.length) {
    const now = new Date(),
      today =
        now.getFullYear() +
        "-0" +
        (now.getMonth() + 1) +
        "-" +
        now.getDate() +
        " " +
        now.getHours() +
        ":" +
        now.getMinutes();
    $datetime.datetimepicker("setStartDate", today);

    const datePickerHtml = $(".datetimepicker").detach();
    field.append(datePickerHtml);
  }

  $("body").on("click", function (e) {
    if ($(e.target)[0] != field[0]) {
      $(".datetimepicker").hide();
    }
  });
}