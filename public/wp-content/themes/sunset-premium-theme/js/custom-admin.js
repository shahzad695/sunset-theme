let profilePicBtn = document.getElementById("profile_picture_button");
let profilePicRemove = document.getElementById("profile_picture_remove_button");
let profilePicval = document.querySelector("#profile_picture");
let profilePicprev = document.querySelector("#profile_picture_preview");
let formSubmitBtn = document.querySelector(".form-overview");

let mediauploader;

profilePicBtn.addEventListener("click", (e) => {
  e.preventDefault;

  if (mediauploader) {
    mediauploader.open();
    return;
  }
  // = wp.media.frames.file_frame
  mediauploader = wp.media({
    title: "Choose profile picture",
    button: {
      text: "Choose picture",
    },
    multiple: false,
  });
  mediauploader.on("select", (e) => {
    let attachment = mediauploader.state().get("selection").first().toJSON();
    profilePicval.value = attachment.url;
    profilePicprev.style.backgroundImage = `url(${attachment.url})`;
    profilePicval.value = attachment.url;
  });

  mediauploader.open();
});
profilePicRemove.addEventListener("click", (e) => {
  e.preventDefault();
  let answer = confirm("Are you sure you want to remove the profile picture");

  if (answer == true) {
    profilePicval.value = "";
    formSubmitBtn.submit();
  }
  return;
});
