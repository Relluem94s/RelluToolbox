/**
 * SlothSearch v2023-09-12
 * @author: folivora97
 */
window.addEventListener('load', function(){
  $("#searchBox").keyup(function () {
    let searchTerm = ($(this).val().toLowerCase());

    if (searchTerm == null || searchTerm == "" || searchTerm == " ") {
      $(".info-box").removeClass("tool-item-hidden");
    }
    else {
      $(".info-box").addClass("tool-item-hidden");
    }

    let resultList = document.querySelectorAll('.info-box[id*="' + searchTerm + '" i]');

    if (resultList.length < 0) {
      return;
    }

    resultList.forEach(
      function (node) {
        let foundItemID = node.id;
        let elem = document.getElementById(foundItemID);

        if (elem.id.includes(searchTerm)) {
          elem.classList.remove('tool-item-hidden');
        }
        else {
          $(".info-box").removeClass("tool-item-hidden");
        }
      }
    );
  });


    //Fallback for Clear Event with [x] Button
  $("#searchBox").on('search', function () {
    $(".info-box").removeClass("hideItems");
  });
});
