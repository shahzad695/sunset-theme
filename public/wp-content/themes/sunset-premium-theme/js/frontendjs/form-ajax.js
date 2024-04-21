import axios from "axios";
export default class formLoader {
  constructor() {
    this.form = document.querySelector(".sunsetform");
    console.log(this.form);
    this.name = document.querySelector("#name");
    this.email = this.form.querySelector("#email");
    this.message = this.form.querySelector("#message");
    this.url = this.form.dataset.url;
    this.submit = this.form.querySelector(".sunsetform__btn");
    this.events();
  }
  /*  =====================================
          Event handlers
      ===================================== */

  events() {
    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
      this.formhandler();
    });
  }

  /*  =====================================
          Methods
      ===================================== */

  async formhandler() {
    let name = this.name.value;
    let email = this.email.value;
    let message = this.message.value;
    console.log("async formhandler");
    const data = new URLSearchParams({
      name: name,
      email: email,
      message: message,
      action: "sunset_contact_form_data",
    });
    const result = await axios.post(this.url, data);
    console.log(result);
  }
}
