import axios from "axios";
import Slider from "./slider";
export default class PostLoader {
  constructor() {
    console.log("construct loaded");
    this.loadBtn = document.querySelector(".btn--loadmore");
    this.postContainer = document.querySelector("#post_container");
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
    console.log(url, page);
    const params = new URLSearchParams({
      action: "sunset_infinite_scroll",
      page: page,
    });
    const response = await axios.post(url, params);
    this.postContainer.innerHTML = response.data;
    let carusole = document.querySelector(".carusole");
    if (carusole) {
      new Slider();
    }
  }
}
