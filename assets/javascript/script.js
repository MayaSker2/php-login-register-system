const container = document.getElementById("container");
const signupBtn = document.getElementById("signupBtn");
const loginBtn = document.getElementById("loginBtn");
const mobileSignup = document.getElementById("mobileSignup");
const mobileLogin = document.getElementById("mobileLogin");

signupBtn.addEventListener("click", (e) => {
  e.preventDefault();
  container.classList.add("active");
});

loginBtn.addEventListener("click", (e) => {
  e.preventDefault();
  container.classList.remove("active");
});

mobileSignup?.addEventListener("click", (e) => {
  e.preventDefault();
  container.classList.add("active");
});

mobileLogin?.addEventListener("click", (e) => {
  e.preventDefault();
  container.classList.remove("active");
});

