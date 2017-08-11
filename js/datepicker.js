$('#datetimePicker .time').timepicker({
  'showDuration': true,
  'timeFormat': 'g:ia'
});

$('#datetimePicker .date').datepicker({
  'format': 'm/d/yyyy',
  'autoclose': true
});

$('#datetimePicker').datepair({
  parseDate: function(input) {
    return $(input).datepicker('getDate');
  },
  updateDate: function(input, dateObj) {
    $(input).datepicker('setDate', dateObj);
    console.log(input);
  }
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


