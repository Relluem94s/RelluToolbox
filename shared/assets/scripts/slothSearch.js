/**
 * SlothSearch v2023-09-12
 * @author: folivora97
 * @param {*} event 
 */
window.onload = (event) => {
  $("#searchBox").keyup(function () {
    let searchTerm = ($(this).val().toLowerCase());

    if (searchTerm == null || searchTerm == "" || searchTerm == " ") {
      $(".info-box").removeClass("hideItems");
    }
    else {
      $(".info-box").addClass("hideItems");
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
          elem.classList.remove('hideItems');
        }
        else {
          $(".info-box").removeClass("hideItems");
        }
      }
    );
  });


    //Fallback for Clear Event with [x] Button
  $("#searchBox").on('search', function () {
    $(".info-box").removeClass("hideItems");
  });
};
