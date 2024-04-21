<form action="" class="sunsetform" method="post" data-url="<?php echo admin_url('admin-ajax.php') ?>">
    <div class="sunsetform__field-cont"><label for="name"></label> <input class="sunsetform__field" id="name" name="name" type="text"
            placeholder="Your Name" required="required" /></div>

    <div class="sunsetform__field-cont"><label for="email"></label> <input class="sunsetform__field" id="email" name="email" type="email"
            placeholder="Your Email" required="required" /></div>

    <div class="sunsetform__field-cont"><label for="message"></label> <textarea class="sunsetform__textarea" id="message" name="message"
            rows="5" placeholder="Your Massage" maxlength="65525" required="required"></textarea></div>

    <button type="submit" class="sunsetform__btn">Submit</button>

</form>