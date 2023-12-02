import axios from "axios";
import Slider from "./slider";
export default class PostLoader {
  constructor() {
    this.loadNextBtn = document.querySelector(".header__loadbtn--next");
    this.loadPrevBtn = document.querySelector(".header__loadbtn--prev");
    this.loadBtn = document.querySelectorAll(".btn--loadmore");
    this.loadIcon = document.querySelector(".sunset-loading");
    this.postContainer = document.querySelector("#post_container");
    this.pageLimit = document.querySelectorAll(".page-limit");
    this.maxPage = this.pageLimit[0].dataset.maxpage;
    this.url = this.pageLimit[0].dataset.adminurl;
    this.loading = false;
    this.events();
    this.urlUpdaterHandler();
    this.postRevealHandler();
  }
  //   events
  events() {
    this.loadBtn.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        let postLoader = e.target;
        this.loadmorePostHandler(postLoader);
      });
    });
  }

  // methods
  async loadmorePostHandler(postLoader) {
    postLoader.previousElementSibling.classList.add("spin");
    postLoader.classList.add("btn-remove");
    let pageNo = postLoader.dataset.page;
    let newPage;
    let prevNo = postLoader.dataset.prev;
    if (prevNo == undefined) {
      prevNo = 0;
    }
    if (pageNo <= this.maxPage && pageNo > 0) {
      const params = new URLSearchParams({
        action: "sunset_infinite_scroll",
        page: pageNo,
        prev: prevNo,
      });
      try {
        const response = await axios.post(this.url, params);
        const result = response.data;
        if (result) {
          if (prevNo != 0) {
            console.log("prev loader");
            newPage = +pageNo - 1;

            this.postContainer.insertAdjacentHTML("afterbegin", result);
          } else {
            console.log("next loader");
            newPage = +pageNo + 1;

            this.postContainer.innerHTML += result;
          }

          postLoader.setAttribute("data-page", newPage);
          this.urlUpdaterHandler();
        }
      } catch (error) {
        console.log("Error fetching data:", error);
        this.loading = false;
      }
      this.postRevealHandler(postLoader, newPage);
      let carusole = document.querySelector(".carusole");
      if (carusole) {
        new Slider();
      }
    }
  }

  urlUpdaterHandler() {
    this.pageLimit = document.querySelectorAll(".page-limit");
    console.log(this.pageLimit);
    let observer = new IntersectionObserver(
      (pages) => {
        pages.forEach((page) => {
          console.log("urlUpdater pages ran", page.target.baseURI);
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

  postRevealHandler(postLoader, newPage) {
    let post = document.querySelectorAll(".post:not(.post--reveal");
    let i = 0;
    let intervalId = setInterval(() => {
      // console.log(post, post.length, i);
      if (i >= post.length) {
        if (postLoader) {
          console.log("spin removed");
          this.btnShowHideHandler(postLoader, newPage);
        }

        clearInterval(intervalId);
        return;
      }
      post[i].classList.add("post--reveal");
      i++;
    }, 1000);
  }
  btnShowHideHandler(postLoader, newPage) {
    postLoader.previousElementSibling.classList.remove("spin");
    postLoader.classList.remove("btn-remove");
    if (newPage <= 1) {
      this.loadPrevBtn.classList.add("hide");
    } else if (newPage >= this.maxPage) {
      this.loadNextBtn.classList.add("hide");
    }
  }
}
