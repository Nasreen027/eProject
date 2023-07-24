const taskFilter =document.querySelector('#taskFilter');
taskFilter.addEventListener("input",filterInput);
function filterInput(event){
    // console.log('clicked');
event.preventDefault();
const currentValue = event.target.value;
// console.log(currentValue);
const filterValue = currentValue.toLowerCase();
// console.log(filterValue);
const listItem = document.querySelectorAll('.tr-row');

listItem.forEach(function (singleLi){
    // console.log(singleLi)
    const singleLiText = singleLi.innerText.toLowerCase();
// console.log(singleLiText);
if(singleLiText.indexOf(filterValue) === -1){
       singleLi.style.display = "none";
}
else{
       singleLi.style.display = "";
}
   
});

};
