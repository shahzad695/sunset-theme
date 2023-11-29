import axios from "axios";
import Slider from "./slider";
export default class PostLoader {
  constructor() {
    this.loadNextBtn = document.querySelector(".header__loadbtn--next");
    this.loadPrevBtn = document.querySelector(".header__loadbtn--prev");
    this.loadBtn = document.querySelector(".header__loadbtn");
    this.loadIcon = document.querySelector(".sunset-loading");
    this.postContainer = document.querySelector("#post_container");
    this.pageLimit = document.querySelectorAll(".page-limit");
    this.maxPage = this.pageLimit[0].dataset.maxpage;
    this.url = this.loadBtn.dataset.adminurl;
    this.loading = false;
    this.events();
    this.urlUpdater();
  }
  //   events
  events() {
    this.nextPostTriger();
    this.prevPostTriger();
  }

  // methods

  nextPostTriger() {
    let loadMorebtn = document.querySelectorAll(".header__loadbtn--next");

    let observer = new IntersectionObserver(
      (loadMore) => {
        loadMore.forEach(async (loadMore) => {
          if (!loadMore.isIntersecting) return;
          let pageNo = this.loadNextBtn.dataset.nextpage;
          console.log(pageNo, this.maxPage);
          if (!this.loading && pageNo < this.maxPage) {
            console.log(pageNo, this.maxPage);

            // console.log("axios sent");
            this.loading = true;
            const params = new URLSearchParams({
              action: "sunset_infinite_scroll",
              page: pageNo,
            });
            try {
              const response = await axios.post(this.url, params);
              console.log(response);
              const result = response.data;
              if (result) {
                this.postContainer.innerHTML += result;
                console.log("axios completed");
                this.loadNextBtn.setAttribute("data-nextpage", +pageNo + 1);
                this.loading = false;
                this.urlUpdater();
              }
            } catch (error) {
              console.log("Error fetching data:", error);
              this.loading = false;
            }
          }
        });
      },
      { threshold: [0.65] /*, rootMargin: "-100px"*/ }
    );
    loadMorebtn.forEach((btn) => {
      observer.observe(btn);
    });

    // let scrollPosition = window.scrollY;
    // let browerHeight = window.innerHeight;
    // let currentHeight = scrollPosition + browerHeight;
    // let totaldocumentHeight = document.documentElement.scrollHeight - 100;
    // let newContentReady = currentHeight >= totaldocumentHeight;
    // if (!this.loading && newContentReady) {
    //   console.log(page, this.maxPage);

    //   if (page <= this.maxPage) {
    //     // console.log("axios sent");
    //     this.loading = true;
    //     this.axiosRequest(this.url, page);
    //     this.loadBtn.setAttribute("data-page", +page + 1);
    //   }
    // }

    // this.loadIcon.classList.remove("spin");
    // this.loadBtn.classList.remove("btn-remove");
    // let carusole = document.querySelector(".carusole");
    // this.reveal();
    // if (carusole) {
    //   new Slider();
    // }
  }
  prevPostTriger() {
    let loadprevbtn = document.querySelector(".header__loadbtn--prev");
    console.log("loadMorebtn");

    let observer = new IntersectionObserver(
      (loadMore) => {
        loadMore.forEach(async (loadMore) => {
          console.log("pevload ran", loadMore.isIntersecting);
          if (!loadMore.isIntersecting) return;
          let prevpageNo = this.loadPrevBtn.dataset.prevpage;
          let pageNo = prevpageNo - 2;
          if (!this.loading && pageNo <= this.maxPage) {
            console.log(pageNo, this.maxPage);

            // console.log("axios sent");
            this.loading = true;
            const params = new URLSearchParams({
              action: "sunset_infinite_scroll",
              page: pageNo,
            });
            try {
              const response = await axios.post(this.url, params);
              const result = response.data;
              if (result) {
                this.postContainer.insertAdjacentHTML("afterbegin", result);
                console.log("axios completed");
                this.loadPrevBtn.setAttribute("data-prevpage", +pageNo - 1);
                this.loading = false;
                this.urlUpdater();
              }
            } catch (error) {
              console.log("Error fetching data:", error);
              this.loading = false;
            }
          }
        });
      },
      { threshold: [0.65] /*, rootMargin: "-100px"*/ }
    );

    observer.observe(loadprevbtn);
  }
  urlUpdater() {
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

  // loadPrevPage(page) {
  //   this.axiosRequest(this.url, page);
  // }

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
