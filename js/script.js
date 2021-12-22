// .......................................... Details Staff
const more_details = document.querySelectorAll(".staff-card-widget .card-body .btn-a");

more_details.forEach(h => {

    h.addEventListener("click", function() {
        // Generically Put the Class Only in that section where event is happened
        this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.add("staff-data-active");
        document.querySelector(".staff-data-active").nextElementSibling.classList.add("staff-detail-data-active");

        // Based on staff-data-active class get all the cards in that section
        const total_cards = document.querySelectorAll(".staff-data-active .card");
        total_cards.forEach((m, index) => {
            index++;
            // Set data attribute id to each card
            m.setAttribute("data-id", `card-${index}`);
        });

        // Get all necessary HTML Elements of current More Details Card section
        const staff_details = document.querySelector(".staff-detail-data-active");
        const more_details_close_btn = document.querySelector(".staff-detail-data-active .outline-btn");
        const details_staff_img = document.querySelector(".staff-detail-data-active .card .card-body .staff-img img");
        const details_staff_name = document.querySelector(".staff-detail-data-active .card .card-body .staff-name h3");
        const details_job_title = document.querySelector(".staff-detail-data-active .card .card-body .job-title h4");
        const details_job_description = document.querySelector(".staff-detail-data-active .card .card-body .about h4");
        const details_job_linkedin = document.querySelector(".staff-detail-data-active .card .card-body .bottom-icons .social .linkedin");
        const details_job_twitter = document.querySelector(".staff-detail-data-active .card .card-body .bottom-icons .social .twitter");
        const details_job_email = document.querySelector(".staff-detail-data-active .card .card-body .bottom-icons .social .email");
        const details_next_button = document.querySelector(".staff-detail-data-active .buttons .right");
        const details_prev_button = document.querySelector(".staff-detail-data-active .buttons .left");

        // Get all necessary HTML Elements of current Brief Details Card section
        this.parentElement.classList.add("me-card-body");
        this.parentElement.previousElementSibling.classList.add("me-card-head");
        const card_id = this.parentElement.parentElement.getAttribute('data-id');
        const card_description = this.parentElement.parentElement.getAttribute('data-description');
        const card_linkedin = this.parentElement.parentElement.getAttribute('data-linkedin');
        const card_twitter = this.parentElement.parentElement.getAttribute('data-twitter');
        const card_email = this.parentElement.parentElement.getAttribute('data-email');

        let card_id_img = `${card_id}-img`;
        let card_id_name = `${card_id}-name`;
        let card_id_job_title = `${card_id}-jobtitle`;
        let card_id_job_description = `${card_id}-description`;
        let card_id_job_linkedin = `${card_id}-linkedin`;
        let card_id_job_twitter = `${card_id}-twitter`;
        let card_id_job_email = `${card_id}-email`;
        let nextno = parseInt(`${card_id}`.slice(5));

        const staff_img = document.querySelector(".staff-data-active .me-card-head img");
        const staff_name = document.querySelector(".staff-data-active .me-card-body .text h4");
        const job_title = document.querySelector(".staff-data-active .me-card-body .text span");

        // changing img data
        details_staff_img.src = staff_img.src;
        details_staff_img.classList.add(`${card_id_img}`);

        // changing name
        details_staff_name.innerText = staff_name.innerText;
        details_staff_name.classList.add(`${card_id_name}`);

        // changing Job Title
        details_job_title.innerText = job_title.innerText;
        details_job_title.classList.add(`${card_id_job_title}`);

        // changing Description
        details_job_description.innerText = card_description;
        details_job_description.classList.add(`${card_id_job_description}`);

        // changing Linkedin
        details_job_linkedin.href = card_linkedin;
        details_job_linkedin.classList.add(`${card_id_job_linkedin}`);

        // changing Twitter
        details_job_twitter.href = card_twitter;
        details_job_twitter.classList.add(`${card_id_job_twitter}`);

        // changing email
        details_job_email.href = card_email;
        details_job_email.classList.add(`${card_id_job_email}`);

        // After Data Setup Generically, Displaying the detail card
        staff_details.classList.remove("d-none");
        this.parentElement.classList.remove("me-card-body");
        this.parentElement.previousElementSibling.classList.remove("me-card-head");

        // Close Button in More Detail Card
        more_details_close_btn.addEventListener("click", () => {
            document.querySelector(".staff-data-active").nextElementSibling.classList.remove("staff-detail-data-active");
            staff_details.classList.add("d-none");
            details_staff_img.classList.remove(`${card_id_img}`);
            details_staff_name.classList.remove(`${card_id_name}`);
            details_job_title.classList.remove(`${card_id_job_title}`);
            details_job_description.classList.remove(`${card_id_job_description}`);
            details_job_linkedin.classList.remove(`${card_id_job_linkedin}`);
            details_job_twitter.classList.remove(`${card_id_job_twitter}`);
            details_job_email.classList.remove(`${card_id_job_email}`);
            this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.classList.remove("staff-data-active");

        });

        // Changing Data by clicking next and previous button
        function changing_data() {
            let nextimg = document.querySelector(`.staff-data-active [data-id = "card-${nextno}"] .card-head img`);
            let nextname = document.querySelector(`.staff-data-active [data-id = "card-${nextno}"] .card-body .text h4`);
            let nexttitle = document.querySelector(`.staff-data-active [data-id = "card-${nextno}"] .card-body .text span`);
            let nextdescription = document.querySelector(`.staff-data-active [data-id = "card-${nextno}"]`);

            // changing img
            details_staff_img.src = nextimg.src;
            // changing name
            details_staff_name.innerText = nextname.innerText;
            // changing Job Title
            details_job_title.innerText = nexttitle.innerText;
            // changing Description Data   
            details_job_description.innerText = nextdescription.getAttribute('data-description');
            // changing twitter Data   
            details_job_twitter.href = nextdescription.getAttribute('data-twitter');
            // changing linkedin Data     
            details_job_linkedin.href = nextdescription.getAttribute('data-linkedin');
            // changing email Data   
            details_job_email.href = nextdescription.getAttribute('data-email');
        }

        details_next_button.addEventListener("click", () => {

            nextno++;
            if (nextno > total_cards.length) {
                nextno = nextno % total_cards.length;
            }
            if (nextno == 0) {
                nextno = 1;
            }

            changing_data();

        });

        details_prev_button.addEventListener("click", () => {
            nextno--;
            if (nextno < 1) {
                nextno = total_cards.length;
            }

            changing_data();

        });
    });
});