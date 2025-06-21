


  function myFunction() {
    let bagItemsStr = localStorage.getItem('bagItems');
    bagItems = bagItemsStr ? JSON.parse(bagItemsStr) : [];
    loadBagItemObjects();
    displayBagSummary();  
    displayBagIcon() 
    displayBagItems()

  }
 
 let bagItemObjects;

  function loadBagItemObjects() {
  console.log(bagItems);
 bagItemObjects = bagItems.map(items => {
    for (let i = 0; i < item.length; i++) {
          
      if (items == item[i].id) {
     
  
       return item[i];
      }
    }
  });
  console.log(bagItemObjects);
  }
 
 
  function displayBagIcon() {
  let bagItemCountElement = document.querySelector('#badge');
  if (bagItems.length > 0) {
    console.log('I am here');
    bagItemCountElement.style.visibility = 'visible';
    bagItemCountElement.innerText = bagItems.length;
  } else {
    bagItemCountElement.style.visibility = 'hidden';
  }
}

 
function displayBagItems() {
  let containerElement = document.querySelector('.bag-items-container');
  let innerHTML = '';
  
 bagItemObjects.forEach(item => {
    innerHTML += generateItemHTML(item);
  });
  containerElement.innerHTML = innerHTML;
}

function generateItemHTML(item) {
  return `<div class="bag-item-container">
    <div class="item-left-part">
      <img class="bag-item-img" src="${item.preview}">
    </div>
    <div class="item-right-part">
      <div class="company">${item.brand}</div>
      <div class="item-name">${item.name}</div>
      <div class="price-container">
 
        <span class="original-price">Rs ${item.price}</span>
      
      </div>
      <div class="return-period">
        <span class="return-period-days">4 days</span> return available
      </div>
      <div class="delivery-details">
        Delivery by
        <span class="delivery-details-days">4</span>
      </div>
    </div>

    <div class="remove-from-cart" onclick="removeFromBag(${item.id})">X</div>
  </div>`;
}

function removeFromBag(items) {
  bagItems = bagItems.filter(bagItems => bagItems != items);
  localStorage.setItem('bagItems', JSON.stringify(bagItems));
  loadBagItemObjects();
  displayBagIcon();
  displayBagItems();
  displayBagSummary();
}

let Delivery_Charge=0;

  function displayBagSummary() {
  let bagSummaryElement = document.querySelector('.bagSummary');
  let totalItem = bagItemObjects.length;
  let totalMRP = 0;
  let totalDiscount = 0;

  bagItemObjects.forEach(bagItems => {
    totalMRP += bagItems.price + 40;
    totalDiscount +=40/100*100 ;
  });

  let finalPayment = totalMRP - totalDiscount + Delivery_Charge;
 

  

  bagSummaryElement.innerHTML = `
    <div class="bag-details-container">
    <div class="price-header" id="tt">PRICE DETAILS (${totalItem}Items) </div>
    <div class="price-item">
      <span class="price-item-tag">Total MRP</span>
      <span class="price-item-value">₹${totalMRP}</span>
    </div>
    <div class="price-item">
      <span class="price-item-tag">Discount on MRP</span>
      <span class="price-item-value priceDetail-base-discount">-₹${totalDiscount}</span>
    </div>
    <div class="price-item">
      <span class="price-item-tag">Convenience Fee</span>
      <span class="price-item-value">₹49</span>
    </div>
    <hr>
    <div class="price-footer">
      <span class="price-item-tag">Total Amount</span>
      <span class="price-item-value" id="fp">₹${finalPayment}</span>
        <span class="price-item-value" id="idpro">₹${bagItems}</span>
    </div>
  </div>
  <button class="btn-place-order">
<div class="css-xjhrni" onclick="xx()">PLACE ORDER</div>
  </button>
  `;
}
function xx(){
 let form=document.getElementById(4).innerHTML;
 document.getElementById("4").style.visibility="visible";
document.getElementById("main").style.visibility="hidden";
document.getElementById("manag").style.marginTop="-10%";
    
function valid() {
    alert("hh")
  let b=document.getElementById("val").value;
  let c=document.getElementById("val1").value;
  let d=document.getElementById("val2").value;
  let e=document.getElementById("val3").value;
  let f=document.getElementById("val4").value;
  let g=document.getElementById("val5").value;
  let h=document.getElementById("val6").value;
  let i=document.getElementById("val7").value;
  let j=document.getElementById("val8").value;
 const k=document.getElementById("size").value;

 let checkRadio = document.querySelector(
                'input[name="dbt"]:checked');


        



 let check = "";
   if(check==b){
    document.getElementById("val").style.border="2px solid red";
    window.alert("TUmhe kya laga tumh borke nahi");
   }
   else if(check===k){
    document.getElementById("size").style.border="2px solid red";

   }
   else if(check==c ){
    document.getElementById("val1").style.border="2px solid red";
    
   }
   else if(check==d ){
    document.getElementById("val2").style.border="2px solid red";
   }
   else if(check==e ){
    document.getElementById("val3").style.border="2px solid red";
    
   }
   else if(check==f ){
    document.getElementById("val4").style.border="2px solid red";
    
   }
   else if(check==g ){
    document.getElementById("val5").style.border="2px solid red";
    
   }
   else if(check==h){
    document.getElementById("val6").style.border="2px solid red";
    
   }
   else if(check==i ){
    document.getElementById("val7").style.border="2px solid red";
    
   }
   else if(check==j ){
    document.getElementById("val8").style.border="2px solid red";
   
   }
  
  else if (checkRadio != null) {
                
              let  ac  = checkRadio.value
                let cd="cd";
                let dbt="dbt";
                let on="on";
                document.getElementById('pay').value=ac;
               window.alert(ac);
                
                   if(ac==cd){
                        
                    
                     window.open("orderPlaced.html");
                   }
                  
                   else if(ac==dbt){
                //     window.alert('sahi h');
                     window.open("Qr.html");
                   }
                  
                  else if(ac==on){
                //  window.alert('sahi h');
                     window.open("index.html");
                 }
          }
          

}

function createData() {
  
  const newData = {
      name: document.getElementById("val").value + document.getElementById("val1").value,
      email: document.getElementById("val8").value,
      productID: document.getElementById("idpro").innerText,
      phone : document.getElementById("val7").value,
      address: document.getElementById("val2").value + document.getElementById("val3").value + document.getElementById("val4").value + document.getElementById("val5").value,
      pincode: document.getElementById("val6").value,
      size : document.getElementById("size").value,
      PAY : document.getElementById("pay").value ,
     Qty : document.getElementById('Qty').value,
    };  
    
    firebase
      .database()
      .ref("users/")
      .push(newData);
alert("hogya")
    }
}


const firebaseConfig = { apiKey: "AIzaSyCh7O9uKAbPPZTIsczBuZuGcuoQLv9-9yY",
  authDomain: "tailorno1-66aa1.firebaseapp.com",
  databaseURL: "https://tailorno1-66aa1-default-rtdb.firebaseio.com",
  projectId: "tailorno1-66aa1",
  storageBucket: "tailorno1-66aa1.appspot.com",
  messagingSenderId: "61332335324",
  appId: "1:61332335324:web:25c289cc1a5ceb94d86219",
  measurementId: "G-G0Z2Z3R6P2"
};
firebase.initializeApp(firebaseConfig);
  
// Create a new data


    
 
