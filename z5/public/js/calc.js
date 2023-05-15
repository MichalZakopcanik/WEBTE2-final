  window.onload = function () {
    var textarea = EqEditor.TextArea.link('latexInput')
      .addOutput(new EqEditor.Output('output'))
      .addHistoryMenu(new EqEditor.History('history'));
  
    EqEditor.Toolbar.link('toolbar').addTextArea(textarea);
  };

  document.addEventListener('DOMContentLoaded', function() {
    var compareBtn = document.getElementById('compareBtn');
    compareBtn.addEventListener('click', compareResults);
  });

  /*function compareResults() {
     $.ajax({
      url: 'https://site249.webte.fei.stuba.sk/z5/compare-result',
      method: 'POST',
      data: {
        textarea.
      },
      success: function(response) {
        console.log("Success");
      },
      error: function(xhr, status, error) {
        console.log("Error");
      }
    });
  }*/