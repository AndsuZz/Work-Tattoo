window.addEventListener("load", () =>{
  const loader = document.querySelector(".loader");
  const loaderbottom = document.querySelector(".loader-bottom");
  const loadercup = document.querySelector(".loader-cup");
  const loaderliquid = document.querySelector(".loader-liquid");
  const dotfalling = document.querySelector(".dot-falling");
  const p = document.querySelector(".p");
  loader.classList.add("loader-hidden");

  loader.addEventListener("trasitionend", () =>{
    document.body.removeChild("loader")
  })
})