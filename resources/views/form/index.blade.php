<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Multi-step Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <style>
      .form-section {
        display: none;
      }
      .form-section.current {
        display: block;
      }
      .parsley-errors-list {
        color: red;
        font-size: 0.875rem;
      }
      .option-card {
        cursor: pointer;
        transition: transform 0.2s;
      }
      .option-card:hover {
        transform: scale(1.05);
      }
      .selected {
        background-color: #e0f2fe;
        border-color: #0284c7;
      }
    </style>
  </head>
  <body>
    <div class="container mx-auto px-4 py-8">
      <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-8">
        <!-- Tailwind Stepper -->
        <ol class="flex items-center w-full text-xs text-gray-900 font-medium sm:text-base mb-6">
        <li class="flex w-full relative text-indigo-600  after:content-['']  after:w-full after:h-0.5  after:bg-indigo-600 after:inline-block after:absolute lg:after:top-5 after:top-3 after:left-4">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-indigo-600 border-2 border-transparent rounded-full flex justify-center items-center mx-auto mb-3 text-sm text-white lg:w-10 lg:h-10">1</span>
         </div>
      </li>
      <li class="flex w-full relative text-indigo-600  after:content-['']  after:w-full after:h-0.5  after:bg-indigo-600 after:inline-block after:absolute lg:after:top-5 after:top-3 after:left-4">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-indigo-600 border-2 border-transparent rounded-full flex justify-center items-center mx-auto mb-3 text-sm text-white lg:w-10 lg:h-10">2</span>
         </div>
      </li>
      <li class="flex w-full relative text-indigo-600  after:content-['']  after:w-full after:h-0.5  after:bg-indigo-600 after:inline-block after:absolute lg:after:top-5 after:top-3 after:left-4">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-indigo-600 border-2 border-transparent rounded-full flex justify-center items-center mx-auto mb-3 text-sm text-white lg:w-10 lg:h-10">3</span>
         </div>
      </li>
      <li class="flex w-full relative text-indigo-600  after:content-['']  after:w-full after:h-0.5  after:bg-indigo-600 after:inline-block after:absolute lg:after:top-5 after:top-3 after:left-4">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-indigo-600 border-2 border-transparent rounded-full flex justify-center items-center mx-auto mb-3 text-sm text-white lg:w-10 lg:h-10">4</span>
         </div>
      </li>
      <li class="flex w-full relative text-indigo-600  after:content-['']  after:w-full after:h-0.5  after:bg-indigo-600 after:inline-block after:absolute lg:after:top-5 after:top-3 after:left-4">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-indigo-600 border-2 border-transparent rounded-full flex justify-center items-center mx-auto mb-3 text-sm text-white lg:w-10 lg:h-10">5</span>
         </div>
      </li>
      <li class="flex w-full relative text-indigo-600  after:content-['']  after:w-full after:h-0.5  after:bg-indigo-600 after:inline-block after:absolute lg:after:top-5 after:top-3 after:left-4">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-indigo-600 border-2 border-transparent rounded-full flex justify-center items-center mx-auto mb-3 text-sm text-white lg:w-10 lg:h-10">6</span>
         </div>
      </li>
      <li class="flex w-full relative text-gray-900  ">
         <div class="block whitespace-nowrap z-10">
             <span class="w-6 h-6 bg-gray-50 border-2 border-gray-200 rounded-full flex justify-center items-center mx-auto mb-3 text-sm  lg:w-10 lg:h-10">7</span>
         </div>
      </li>
        </ol>

        <!-- Form -->
        <form action="{{ route('form.store') }}" method="POST" id="multi-step-form" class="registration-form">
          @csrf

          <!-- Step 1: Which Degree? -->
          <div class="form-section current">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Which Degree?</h2>
            <div class="grid grid-cols-2 gap-4">
              <button type="button" class="option-card bg-gray-100 border rounded-lg p-4" data-value="Bachelor">Bachelor</button>
              <button type="button" class="option-card bg-gray-100 border rounded-lg p-4" data-value="Master">Master</button>
              <button type="button" class="option-card bg-gray-100 border rounded-lg p-4" data-value="Diploma">Diploma</button>
              <button type="button" class="option-card bg-gray-100 border rounded-lg p-4" data-value="Other">Other</button>
            </div>
            <input type="hidden" name="degree" id="degree" required>
          </div>

          <!-- Step 2: Where Are You Living? -->
          <div class="form-section">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Where Are You Living?</h2>
            <input type="text" id="city" name="city" placeholder="Type your city or postal code" class="w-full border rounded-lg p-3" required>
            <div id="city-suggestions" class="mt-2 bg-white shadow-md rounded-lg"></div>
          </div>

          <!-- Step 3: Industry Selection -->
          <div class="form-section">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Which Industry Are You Interested In?</h2>
            <div class="grid grid-cols-3 gap-4">
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Tech">Tech</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Healthcare">Healthcare</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Finance</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Marketing</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Electronics</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Gastronomy</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Construction and real estate</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Commercial and administrative</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Insurance</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">IT</button>
              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Education">Education</button>

              <button type="button" class="industry-card bg-gray-100 border rounded-lg p-4" data-value="Other">Other</button>
            </div>
            <input type="hidden" name="industries" id="industries" required>
            <div id="custom-industry" class="mt-4 hidden">
              <label for="customIndustryInput" class="block text-sm font-medium">Please specify:</label>
              <input type="text" id="customIndustryInput" name="customIndustry" class="w-full border rounded-lg p-3">
            </div>
          </div>

          <!-- Step 4: Which Job Are You Looking For? -->
          <div class="form-section">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Which Job Are You Looking For?</h2>
            <input type="text" id="jobTitle" name="jobTitle" placeholder="Type your desired job title" class="w-full border rounded-lg p-3">
            <p class="text-sm text-gray-600 mt-2">You can skip this step if unsure.</p>
          </div>

          <!-- Step 5: Skills Selection -->
            <div class="form-section">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">What Skills Do You Have?</h2>
            <div class="grid grid-cols-3 gap-4">
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Leadership">Leadership</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Communication">Communication</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Devops">Devops</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Time Management">Time Management</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Adaptability">Adaptability</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Collaboration">Collaboration</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Digital Marketing">Digital Marketing</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Design Skills">Design Skills</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Financial Literacy">Financial Literacy</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Data Analysis">Data Analysis</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Emotional Intelligence">Emotional Intelligence</button>
                <button type="button" class="skill-card bg-gray-100 border rounded-lg p-4" data-value="Coding">Coding</button>
            </div>
            <div id="skill-selection-error" class="text-red-500 hidden mt-2">Please select between 3 and 5 skills to proceed.</div>
            <input type="hidden" name="skills" id="selected-skills" required>
            <button id="next-step" type="button" class="mt-4 bg-indigo-600 text-white rounded-lg p-2 disabled:opacity-50" disabled>Next Step</button>
            </div>

          <!-- Step 6: Create Your Account -->
          <div class="form-section">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Create Your Account</h2>
            <div class="space-y-4">
              <input type="text" name="name" id="name" placeholder="Full Name" class="w-full border rounded-lg p-3" required>
              <input type="email" name="email" id="email" placeholder="Email Address" class="w-full border rounded-lg p-3" required>
              <input type="password" name="password" id="password" placeholder="Password" class="w-full border rounded-lg p-3" required>
              <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="w-full border rounded-lg p-3" required>
            </div>
          </div>

          <!-- Step 7: Verify Your Number -->
          <div class="form-section">
            <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Verify Your Number</h2>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" class="w-full border rounded-lg p-3" required>
            <button type="button" id="sendVerificationCode" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">Send Verification Code</button>
            <input type="text" id="verificationCode" name="verificationCode" placeholder="Enter verification code" class="w-full border rounded-lg p-3 mt-4 hidden">
          </div>

          <!-- Navigation Buttons -->
          <div class="form-navigation flex justify-between mt-6">
            <button type="button" class="previous bg-gray-300 text-gray-700 px-4 py-2 rounded" disabled>Previous</button>
            <button type="button" class="next bg-indigo-600 text-white px-4 py-2 rounded">Next</button>
            <button type="submit" class="submit bg-green-600 text-white px-4 py-2 rounded">Submit</button>
            </div>
        </form>
      </div>
    </div>

    <script>
  $(document).ready(function () {
    const $sections = $(".form-section");
    let currentIndex = 0;
    const maxIndustrySelection = 3;
    const maxSkillsSelection = 5;
    const minSkillsSelection = 3;
    const selectedIndustries = [];
    const selectedSkills = [];

    // Initialize Parsley for the form
    const form = $(".registration-form").parsley();

    // Function to update the display of the form and buttons
    function navigateTo(index) {
      $sections.removeClass("current").eq(index).addClass("current");

      // Toggle visibility of the Previous button
      $(".previous").toggle(index > 0);

      // Toggle visibility of the Next button or Submit button depending on step
      const atEnd = index >= $sections.length - 1;
      $(".next").toggle(!atEnd);
      $(".submit").toggle(atEnd);

      // Update the step indicator
      updateStepIndicator(index);
    }

    // Function to update the step indicator (dots on top)
    function updateStepIndicator(index) {
      $("ol li span").each((i, el) => {
        $(el).toggleClass("bg-indigo-600 text-white", i <= index);
        $(el).toggleClass("bg-gray-200 text-gray-600", i > index);
      });
    }

    // Event for Next button
    $(".next").click(function () {
      const currentSection = $sections.eq(currentIndex);
      // Validate form inputs in the current section
      if (currentSection.find(":input").length === 0 || form.validate({ group: `block-${currentIndex}` })) {
        currentIndex++;
        navigateTo(currentIndex);
      }
    });

    // Navigate to the previous step
    $(".previous").click(function() {
      if (currentIndex > 0) {
        currentIndex--;
        navigateTo(currentIndex);
      }
    });

    // Step 1: Degree Selection (handling card selection)
    $(".option-card").click(function () {
      $(".option-card").removeClass("selected");
      $(this).addClass("selected");
      $("#degree").val($(this).data("value"));
    });
// City Auto-Suggest

$("input#city").on('input', function () {
  const query = $(this).val();

  if (query.length >= 3) { // Trigger when input has 3 or more characters
    $.ajax({
      url: '/cities/search', // Backend route for city search
      method: 'GET',
      data: { query: query },
      success: function (data) {
        if (data && data.length > 0) {
          // Generate suggestion list
          let suggestionsHtml = data.map(city => {
            return `
              <div class="city-suggestion p-2 cursor-pointer hover:bg-gray-200"
                   data-city="${city.city_name}"
                   data-postal="${city.postal_code}">
                ${city.city_name}, ${city.postal_code}
              </div>`;
          }).join('');

          $('#city-suggestions').html(suggestionsHtml).show(); // Display suggestions

          // Click event for selecting a city
          $(".city-suggestion").click(function () {
            const selectedCity = $(this).data("city"); // Selected city name
            const selectedPostalCode = $(this).data("postal"); // Selected postal code

            // Populate city name and postal code
            $("#city").val(selectedCity); // Set city name
            $("#postalCode").val(selectedPostalCode); // Optional: Set postal code in a separate field

            $('#city-suggestions').hide(); // Hide suggestions after selection

            // Trigger change event for validation
            $("input#city").trigger('change');
          });
        } else {
          $('#city-suggestions').html('<div class="p-2 text-gray-500">No results found</div>').show();
        }
      },
      error: function () {
        $('#city-suggestions').html('<div class="p-2 text-red-500">Error fetching data</div>').show();
      }
    });
  } else {
    $('#city-suggestions').hide(); // Hide suggestions if input length is less than 3
  }
});

// Close the suggestions when clicking outside the input or suggestions
$(document).click(function (e) {
  if (!$(e.target).closest('#city, #city-suggestions').length) {
    $('#city-suggestions').hide();
  }
});


    // Step 3: Industry Selection
    $(".industry-card").click(function () {
      const value = $(this).data("value");

      if (value === "Other") {
        $("#custom-industry").removeClass("hidden");
        return;
      }

      // Select or deselect industry
      if ($(this).hasClass("selected")) {
        $(this).removeClass("selected");
        const index = selectedIndustries.indexOf(value);
        if (index > -1) selectedIndustries.splice(index, 1);
      } else if (selectedIndustries.length < maxIndustrySelection) {
        $(this).addClass("selected");
        selectedIndustries.push(value);
      }

      $("#selected-industries").val(selectedIndustries.join(", "));
    });


$(".skill-card").click(function () {
  const value = $(this).data("value");

  // Toggle skill selection
  if ($(this).hasClass("selected")) {
    $(this).removeClass("selected");
    const index = selectedSkills.indexOf(value);
    if (index > -1) selectedSkills.splice(index, 1);
  } else if (selectedSkills.length < maxSkillsSelection) {
    $(this).addClass("selected");
    selectedSkills.push(value);
  }

  // Update the hidden input value
  $("#selected-skills").val(selectedSkills.join(", "));

  // Check if the selection is valid and enable/disable the next button
  if (selectedSkills.length >= minSkillsSelection && selectedSkills.length <= maxSkillsSelection) {
    $("#skill-selection-error").addClass("hidden");
    $("#next-step").prop("disabled", false);
  } else {
    $("#skill-selection-error").removeClass("hidden");
    $("#next-step").prop("disabled", true);
  }
});

// Next step button click handler
$("#next-step").click(function () {
  alert("Proceeding to the next step with selected skills: " + selectedSkills.join(", "));
  // Add logic to navigate to the next step or submit the form
});

    // Step 6: Account Creation (Password Match Check)
    $("#password, #confirm-password").on("input", function () {
      const password = $("#password").val();
      const confirmPassword = $("#confirm-password").val();

      if (password !== confirmPassword) {
        $("#password-match-error").removeClass("hidden");
      } else {
        $("#password-match-error").addClass("hidden");
      }
    });

    // Step 7: Phone Verification (Simulate Sending Code)
$("#verify-phone").click(function () {
  const phoneNumber = $("#phone").val(); // Get the phone number input value
  if (!phoneNumber || phoneNumber.trim() === "") {
    // If phone number is empty, show an error
    $("#phone-error").removeClass("hidden");
  } else {
    // Hide any existing error message
    $("#phone-error").addClass("hidden");

    // Simulate sending verification code with a success message
    setTimeout(function () {
      alert("Verification code sent!"); // Alert after phone number validation
      $("#verification-success").removeClass("hidden"); // Show success message
      $("#verificationCode").show(); // Show verification code input field

      // Simulate animation (optional)
      setTimeout(function () {
        $("#rocket-launch").addClass("animated");
      }, 1000);
    }, 2000); // Simulate a delay before sending
  }
});

    // Phone number verification logic
    $("#sendVerificationCode").click(function () {
    $("#verificationCode").show(); // Show verification code field
    alert("Verification code sent!"); // Alert for code sent
    });


    // Set Parsley validation groups for each section
    $sections.each((index, section) => {
      $(section)
        .find(":input")
        .attr("data-parsley-group", `block-${index}`);
    });

    // Initial navigation setup
    navigateTo(0);
  });
</script>

  </body>
</html>
