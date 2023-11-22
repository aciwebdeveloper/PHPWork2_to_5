<script>
 function SubmitForm(BTN, form, url) {
  //  here we create button selcetor
  let btn = document.querySelector(`${BTN}`);


  //  create event listner on that button
  btn.addEventListener("click", function (event) {

   event.preventDefault(); // button functionality disable 

   // create form selector 
   let Form = document.querySelector(`${form}`)

   // form object values
   let Form_Value = new FormData(Form);

   // ajax call 

   (async () => {

    let options = {

     method: "POST",
     body: Form_Value,

    };
console.log(url)

    let response = await fetch(url,options);

    let result = await response.json();

    let div = document.querySelector("#demo");
    
    div.innerHTML=result.messege

   })()


   // console.log([...Form_Value.entries()]);

  })
 }

 SubmitForm("#submit", "#formData", "<?php echo Insert ?>")


</script>