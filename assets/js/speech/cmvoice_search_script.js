try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}


var noteTextarea = $('#cmpn_general_comments');
var instructions = $('#recording-instructions');
var notesList = $('ul#notes');
var noteContent = "";
recognition.continuous = true;

recognition.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);
  if(!mobileRepeatBug) {
    noteContent += transcript;
    cmnotes_voice_ajax(noteContent);
    //$('#pause-record-btn').trigger('click');
  }
};

/*recognition.onstart = function() { 
  instructions.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition.onspeechend = function() {
  instructions.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition.onerror = function(event) {
  if(event.error == 'no-speech') {
    instructions.text('No speech was detected. Try again.');  
  };
}*/



/*-----------------------------
      App buttons and input 
------------------------------*/

$('#start-record-btn').on('click', function(e) {
  if (noteContent.length) {
    noteContent += ' ';
  }
  recognition.start();
  $(this).hide();
  $('#pause-record-btn').show();
  $("#recording-instructions").show();
});


$('#pause-record-btn').on('click', function(e) {
  recognition.stop();
  instructions.text('Voice recognition paused.');
  $(this).hide();
  $('#start-record-btn').show();
});

noteTextarea.on('input', function() {
  noteContent = $(this).val();
})

function cmnotes_voice_ajax(noteContent){
  console.log(noteContent);
    var Host = $("#base_url").val();
    $.ajax({
        type: 'POST',
        url: Host + "ClientsAdmission/notes_voice_ajax",
        data: "noteContent=" + noteContent,
        success: function(data) {
            var json = $.parseJSON(data);
            $("#cmpn_general_comments").val(json.note_content);
            if(json.voice_stop == "stop"){
                $('#pause-record-btn').trigger('click');
            }
            
        }
    });
}

// For Review

