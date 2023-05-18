
  window.onload = function () {
    var textarea = EqEditor.TextArea.link('latexInput')
      .addOutput(new EqEditor.Output('output'))
      .addHistoryMenu(new EqEditor.History('history'));
  
    EqEditor.Toolbar.link('toolbar').addTextArea(textarea);
  };

 /* document.addEventListener('DOMContentLoaded', function() {
    var compareBtn = document.getElementById('compareBtn');
    compareBtn.addEventListener('click', compareResults);
  });*/

  function compareResults(result) {
    var latexInput = document.getElementById('latexInput');
    var spans = latexInput.getElementsByTagName('span');
    var equationText = '';
    for (var i = 0; i < spans.length; i++) {
      equationText += spans[i].textContent;
    }
    console.log(equationText);
    console.log(result);
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
     $.ajax({
      url: 'https://site249.webte.fei.stuba.sk/z5/compare-result',
      method: 'POST',
      data: {
        input: equationText,
        result: result
      },
      headers: {
        'X-CSRF-TOKEN': csrfToken 
      },
      dataType: 'json',
      success: function(response) {
       /* console.log("Success");
        console.log(response.result);*/
       
       
        //TODO: upraviť podľa jazyku
        var resultElement = document.getElementById('result');
  
        if (response.result === 1) {
          resultElement.innerHTML = "Správny výsledok";
          resultElement.classList.add('correct');
        } else {
          resultElement.classList.add('incorrect');
          resultElement.innerHTML = "Nesprávny výsledok";
        }
  
        var pointsElement = document.getElementById('points');
        if (response.result === 1) {
          pointsElement.innerHTML = 'You earned 10 points!';
        } else {
          pointsElement.innerHTML = 'No points earned.';
        }
      },
      error: function(xhr, status, error) {
       /* console.log("Error");
        console.log(xhr.responseText); // Log the response text for debugging
        console.log(xhr.status); // Log the status code for debugging
        console.log(error); // Log the error message for debugging*/
        var resultElement = document.getElementById('result');
        resultElement.innerHTML = "Niekde nastala chyba, skúste poslať znovu alebo upraviť tvar výsledku";
        resultElement.classList.add('incorrect');
      }
    });
  }