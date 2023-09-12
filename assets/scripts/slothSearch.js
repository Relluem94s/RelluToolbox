/**
 * SlothSearch v2023-09-12
 * @author: folivora97
 * @param {*} event 
 */
window.onload = (event) => {
    
    $("#searchBox").keyup(function() {
        let searchTerm = ($(this).val());
        
        if(searchTerm == null || searchTerm == "" || searchTerm == " "){
            $(".highlightedSearch").removeClass("highlightedSearch");
            $(".info-box").removeClass("hideItems");
        }
        else{
            $(".info-box").addClass("hideItems");
        }
       
        let resultList = document.querySelectorAll('.info-box[id*="'+searchTerm+'"]');

        resultList.forEach(
            function(node) {
              let foundItemID = node.id;
              let elem = document.getElementById(foundItemID);

              if(elem.id.includes(searchTerm)){
                elem.classList.add('highlightedSearch');
                elem.classList.remove('hideItems');
              }
              else{
                $(".info-box").removeClass("hideItems");
                elem.classList.remove('highlightedSearch');
              }
            }
          );
      });
  };