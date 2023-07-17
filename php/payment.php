<form action="" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_dubYbWRGwUD3yZ" 
    data-amount="29935" 
    data-currency="INR"
    data-id="<?php echo 'order'.rand(10,100).'end'; ?>"
    data-buttontext="Pay with Razorpay"
    data-name="CourseHub"
    data-description="Learn Courses & Upgrade your skills."
    data-image="https://leverageedublog.s3.ap-south-1.amazonaws.com/blog/wp-content/uploads/2020/06/08074331/2-Year-Degree-Courses-After-12th.jpg"
    data-prefill.name="Surya Prakash"
    data-prefill.email="prakashsurya1204@gmail.com"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>
</form>
