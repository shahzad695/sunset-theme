import axios from "axios";
import Slider from "./slider";
export default class PostLoader {
  constructor() {
    this.loadBtn = document.querySelector(".btn--loadmore");
    this.loadIcon = document.querySelector(".sunset-loading");
    this.postContainer = document.querySelector("#post_container");
    this.pageLimit = document.querySelectorAll(".page-limit");
    this.loading = false;
    this.events();
    this.observer();
  }
  //   events
  events() {
    document.addEventListener("DOMContentLoaded", () => {
      window.addEventListener("scroll", () => {
        console.log("scroll");
        this.loadTriger();
        this.observer();
      });
    });
  }
  // methods
  async loadTriger() {
    let url = this.loadBtn.dataset.adminurl;
    let page = this.loadBtn.dataset.page;
    let maxPage = this.pageLimit[0].dataset.maxpage;

    // this.pageLimit.setAttribute("data-page", +page + 1);
    // this.loadIcon.classList.add("spin");
    // this.loadBtn.classList.add("btn-remove");
    const params = new URLSearchParams({
      action: "sunset_infinite_scroll",
      page: page,
    });
    let scrollPosition = window.scrollY;
    let browerHeight = window.innerHeight;
    let currentHeight = scrollPosition + browerHeight;
    let totaldocumentHeight = document.documentElement.scrollHeight - 100;
    let newContentReady = currentHeight >= totaldocumentHeight;
    if (!this.loading && newContentReady) {
      console.log(page, maxPage);

      if (page <= maxPage) {
        // console.log("axios sent");
        this.loading = true;

        try {
          const response = await axios.post(url, params);

          var result = response.data;

          if (result) {
            this.postContainer.innerHTML += result;
            this.loadBtn.setAttribute("data-page", +page + 1);
            this.loading = false;
            // let pageurl = document.querySelectorAll(".page-limit");
            // console.log(pageurl);
            // pageurl.forEach((page, index, arr) => {
            //   if (index == arr.length - 1) {
            //     console.log(index, arr.length);
            //     window.history.pushState(
            //       "",
            //       "",
            //       page.getAttribute("data-pageurl")
            //     );
            //   }
            // });

            // Update the URL
            // updateUrl(page);
          }
        } catch (error) {
          console.log("Error fetching data:", error);
          this.loading = false;
        }
      }
    }

    // this.loadIcon.classList.remove("spin");
    // this.loadBtn.classList.remove("btn-remove");
    // let carusole = document.querySelector(".carusole");
    // this.reveal();
    // if (carusole) {
    //   new Slider();
    // }
  }
  observer() {
    this.pageLimit = document.querySelectorAll(".page-limit");
    let observer = new IntersectionObserver(
      (pages) => {
        pages.forEach((page) => {
          if (!page.isIntersecting) {
            return;
          }
          window.history.pushState(
            "",
            "",
            page.target.getAttribute("data-pageurl")
          );
        });
      },
      { threshold: [0.15], rootMargin: "-10%" }
    );
    this.pageLimit.forEach((page) => {
      observer.observe(page);
    });
  }

  reveal() {
    let post = document.querySelectorAll(".post:not(.post--reveal");
    let i = 0;
    let intervalId = setInterval(function () {
      // console.log(post, post.length, i);
      if (i >= post.length) {
        clearInterval(intervalId);
        return;
      }
      post[i].classList.add("post--reveal");
      i++;
    }, 1000);
  }
}
