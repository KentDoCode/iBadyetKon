const toggle = document.getElementById("togglepassword");
const pw = document.getElementById("password");

toggle.addEventListener('click', (e) => {
  const type = pw.getAttribute('type') === 'password' ? 'text' : 'password';
  pw.setAttribute('type', type)
  
})

const confirmtoggle = document.getElementById("confirm-toggle-password");
const cpassword = document.getElementById("confirm-password");

confirmtoggle.addEventListener('click', (e) => {
  const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
  cpassword.setAttribute('type', type)
  
})