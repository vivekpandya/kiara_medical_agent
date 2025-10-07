try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}


var noteTextarea = $('#editor_notes1');
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
    notes_voice_ajax(noteContent);
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

function notes_voice_ajax(noteContent){
    var nots_date = $("#nots_taken_date").val();
    var nots_title = $("#activities_task_subject_text0").val();
    var Host = $("#base_url").val();
    $.ajax({
        type: 'POST',
        url: Host + "ClientsNotes/notes_voice_ajax",
        data: "nots_date="+nots_date+"&nots_title="+nots_title+"&noteContent=" + noteContent,
        success: function(data) {
            var json = $.parseJSON(data);
            $("#nots_taken_date").val(json.note_date);
            CKEDITOR.instances['editor_notes'].setData(json.note_content);
            $("#activities_task_subject_text0").val(json.note_title);
            if(json.voice_stop == "stop"){
                $('#pause-record-btn').trigger('click');
            }
            if(json.note_action == "save"){
                saveNotes();
            }
        }
    });
}

// For title

try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  var recognition_title = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}


var noteTextarea = $('#activities_task_subject_text0');
var instructions = $('#recording-instructions');
var notesList = $('ul#notes');
var noteTitle = "";
recognition_title.continuous = true;

recognition_title.onresult = function(event) {
  var current = event.resultIndex;
  var transcript = event.results[current][0].transcript;
  var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);
  if(!mobileRepeatBug) {
    noteTitle = transcript;
    $("#activities_task_subject_text0").val(noteTitle);
    $('#pause-record-btn-title').trigger('click');
  }
};

$('#start-record-btn-title').on('click', function(e) {
  if (noteTitle.length) {
    noteTitle += ' ';
  }
  recognition_title.start();
  $(this).hide();
  $('#pause-record-btn-title').show();
  $("#recording-instructions").show();
});


$('#pause-record-btn-title').on('click', function(e) {
  recognition_title.stop();
  instructions.text('Voice recognition paused.');
  $(this).hide();
  $('#start-record-btn-title').show();
});