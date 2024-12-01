<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>

    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

    <!-- Include a confetti library for animation -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
</head>
<body class="bg-gray-100">

<!-- Modal Container -->
<div x-data="{
    imagePreview: '',
    formVisible: true,
    profileVisible: false,
    submitForm() {
        const selfDescription = this.$refs.selfDescription.value;
        const address = this.$refs.address.value;

        // Show the rocket launch animation
        this.formVisible = false;

        // Delay the profile content reveal and confetti after animation
        setTimeout(() => {
            this.formVisible = false; // Hide the form
            this.profileVisible = true; // Show the profile

            // Set profile details after form submission
            this.$nextTick(() => {
                document.getElementById('profile-description').textContent = selfDescription;
                document.getElementById('profile-address').textContent = address;

                // Trigger the confetti animation after form submission
                triggerConfetti();
            });
        }, 1000); // Increased duration for the profile content to appear
    }
}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">

    <!-- Profile Info Form -->
    <div x-show="formVisible" class="bg-white rounded-lg shadow-xl p-8 w-full sm:w-96 md:w-1/2 lg:w-1/3 xl:w-1/4 max-w-full transition-opacity duration-500 ease-in-out" :class="{'opacity-0': !formVisible}">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Complete Your Profile</h2>

        <form id="profile-form" @submit.prevent="submitForm">
            <!-- Profile Picture Upload -->
            <div class="mb-6 text-center">
                <label for="profile_picture" class="block text-lg font-medium text-gray-700 mb-2">Profile Picture</label>
                <div class="mb-4">
                    <img :src="imagePreview" x-show="imagePreview" class="w-32 h-32 rounded-full mx-auto" alt="Profile Picture">
                </div>
                <input type="file" name="profile_picture" accept="image/*" class="block w-full border border-gray-300 rounded-lg p-2 mb-4" @change="imagePreview = URL.createObjectURL($event.target.files[0])" required>
            </div>

            <!-- Self-Description -->
            <div class="mb-6">
                <label for="self_description" class="block text-lg font-medium text-gray-700 mb-2">Self-Description</label>
                <textarea x-ref="selfDescription" name="self_description" rows="4" class="block w-full border border-gray-300 rounded-lg p-2 mb-4 focus:ring-2 focus:ring-blue-500" placeholder="Tell us about yourself..." required></textarea>
            </div>

            <!-- Address Details -->
            <div class="mb-6">
                <label for="address" class="block text-lg font-medium text-gray-700 mb-2">Address</label>
                <input x-ref="address" type="text" name="address" class="block w-full border border-gray-300 rounded-lg p-2 mb-4 focus:ring-2 focus:ring-blue-500" placeholder="Street name, house number" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Finish</button>
        </form>
    </div>

    <!-- Profile Content (Visible After Form Completion) -->
    <div x-show="profileVisible" class="bg-white rounded-lg shadow-xl p-8 w-full sm:w-96 md:w-1/2 lg:w-1/3 xl:w-1/4 max-w-full transition-opacity duration-500 ease-in-out opacity-0" x-transition:enter="transition-opacity duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 text-center">Your Profile</h2>

        <!-- Example Profile Content -->
        <div class="text-center mb-6">
            <img :src="imagePreview" class="w-32 h-32 rounded-full mx-auto mb-4" alt="Profile Picture">
            <p class="text-xl text-gray-700">Self Description: <span id="profile-description"></span></p>
            <p class="text-xl text-gray-700">Address: <span id="profile-address"></span></p>
        </div>
    </div>
</div>

<script>
    // Confetti trigger function
    function triggerConfetti() {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: { x: 0.5, y: 0.5 },
            colors: ['#ff0', '#f00', '#00f', '#0f0'],
        });
    }
</script>

</body>
</html>
