import axios from "axios";
import Slider from "./slider";
export default class PostLoader {
  constructor() {
    this.loadBtn = document.querySelector(".btn--loadmore");
    this.loadIcon = document.querySelector(".sunset-loading");
    this.postContainer = document.querySelector("#post_container");
    this.reveal();
    this.events();
  }
  //   events
  events() {
    this.loadBtn.addEventListener("click", (e) => {
      e.preventDefault();
      this.loadTriger();
    });
  }
  // methods
  async loadTriger() {
    let url = this.loadBtn.dataset.adminurl;
    let page = this.loadBtn.dataset.page;
    this.loadBtn.setAttribute("data-page", +page + 1);
    this.loadIcon.classList.add("spin");
    this.loadBtn.classList.add("btn-remove");
    console.log(url, page);
    const params = new URLSearchParams({
      action: "sunset_infinite_scroll",
      page: page,
    });
    const response = await axios.post(url, params);
    this.postContainer.innerHTML += response.data;
    window.history.pushState("", "", "page/" + (+page + 1));
    this.loadIcon.classList.remove("spin");
    this.loadBtn.classList.remove("btn-remove");
    let carusole = document.querySelector(".carusole");
    this.reveal();
    if (carusole) {
      new Slider();
    }
  }
  reveal() {
    let post = document.querySelectorAll(".post:not(.post--reveal");
    let i = 0;
    let intervalId = setInterval(function () {
      console.log(post, post.length, i);
      if (i >= post.length) {
        clearInterval(intervalId);
        return;
      }
      post[i].classList.add("post--reveal");
      i++;
    }, 1000);
  }
}
