
  window.onload = function () {
    var textarea = EqEditor.TextArea.link('latexInput')
      .addOutput(new EqEditor.Output('output'))
      .addHistoryMenu(new EqEditor.History('history'));
  
    EqEditor.Toolbar.link('toolbar').addTextArea(textarea);
  };
  function compareResults(solutionId) {
    var resultElement = document.getElementById('result');
    var latexInput = document.getElementById('latexInput');
    var spans = latexInput.getElementsByTagName('span');
    var result = '';
    for (var i = 0; i < spans.length; i++) {
      result += spans[i].textContent;
    }
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
     $.ajax({
      url: window.location.origin+'/compare-result/'+solutionId,
      method: 'POST',
      data: {
        result: result
      },
      headers: {
        'X-CSRF-TOKEN': csrfToken 
      },
      dataType: 'json',
      success: function(response) {
        console.log(response);
          resultElement.innerHTML = response.message;
          resultElement.classList.remove('incorrect');
          resultElement.classList.add('correct');
      },
      error: function(xhr, status, error) {
        resultElement.innerHTML =  xhr.responseJSON.message;
        resultElement.classList.remove('correct');  
        resultElement.classList.add('incorrect');
      }
    });
  }