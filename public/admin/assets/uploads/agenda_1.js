var nestedSortables = [].slice.call(
  document.querySelectorAll(".nested-sortable")
);

// Loop through each nested sortable element
for (var i = 0; i < nestedSortables.length; i++) {
  new Sortable(nestedSortables[i], {
    group: "nested",
    animation: 150,
    fallbackOnBody: true,
    swapThreshold: 0.65,
    onEnd: function (/**Event*/ evt) {
      var deepTest = $('div#agendaItems .list-group-item  .list-group-item .list-group-item .list-group-item')
      if(deepTest.length > 0){
       
      }else{
        
        updateOrder()
      }
      
    },
    handle: ".grabSort",
   // filter: "div#agendaItems .list-group-item  .list-group-item .list-group-item",  // Selectors that do not lead to dragging (String or Function)
    //preventOnFilter: true,
    removeCloneOnHide: true,
    dataIdAttr: 'data-id',
  });
}

const updateOrder = () => {
  var items = [];
  $("#agendaItems > div").each((index, el) => {
    let parent = getParams(index, el);
    items.push(parent);
    $('div[data-id="' + parent.id + '"] > .nested-sortable > div').each(
      (index, childEl) => {
        let child = getParams(index, childEl, parent.id);
        if (child) items.push(child);
        $('div[data-id="' + child.id + '"] > .nested-sortable > div').each(
          (grandChildIndex, grandChildEl) => {
            let grandChild = getParams(grandChildIndex, grandChildEl, child.id);
            if (grandChild) items.push(grandChild);
          }
        );
      }
    );
  });

  if(items.length < 1)
    return false

    
  const url = "/meetings/menuSortableSave"
  $.post(url, {items}, function () {})
    .done(function (res) {
      toggleAgendaDeleteButtons()
    })
    .fail(function (err) {
      console.error(err);
      
    });

//
};

const getParams = (index, el, parent_id = 0) => {
 let params = {}
 params.id = $(el).attr("data-id")
 params.parent_id = parent_id;
 params.rang = index;
 return params
}


function removeAgendaItem(event, item_id){
  event.preventDefault()
  var msg = $('#agendaRemoveMsg').val()

  if(! confirm(msg))
    return false
  
  const url = '/meetings/deleteAgendaItem/' + item_id
  $.get(url, function () { 


   })
    .done(function (res) { 
      var el = $('div[data-id="' + item_id + '"]')
      
      el.fadeOut()
      setTimeout(function(){
        el.remove()
        toggleAgendaDeleteButtons()

      }, 1000)
     })
    .fail(function (err) {
      console.error(err);

    });

}


function toggleAgendaDeleteButtons(){
  var selector = '.list-group-item'
  $(selector).each((index, el) => {
    let nested = $(el).find(selector)
    let delBtn = $(el).find('.delete-btn').first()
    //console.log('check' + index + 'length' + nested.length);

    if(nested.length > 0)
      delBtn.hide()
    else
      delBtn.show()
    
      
  })

  return true;
}