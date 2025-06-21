
function myFunction() {
    let bagItemsStr = localStorage.getItem('bagItems');
    bagItems = bagItemsStr ? JSON.parse(bagItemsStr) : [];
  
    displayBagIcon() 
    displayBagItems()
  }
  function displayBagIcon() {
   // alert("me bhi chal raha hai")
  let bagItemCountElement = document.querySelector('#badge');
  if (bagItems.length > 0) {
    console.log('I am here');
    bagItemCountElement.innerText = bagItems.length;
  } else {
    bagItemCountElement.style.visibility = 'hidden';
  }
  }
  