function confirmDelete(){
   const x =confirm("Are you sure?");
   console.log(x);
   if(x===false){
    preventDefault();
   }
}