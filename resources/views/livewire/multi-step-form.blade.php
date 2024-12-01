<div>
    <div class="container mx-auto p-8">
        <!-- Progress Stepper -->
        <ol class="flex items-center w-full text-xs text-gray-900 font-medium sm:text-base">
            @for ($i = 1; $i <= 7; $i++)
                <li class="flex w-full relative {{ $currentStep >= $i ? 'text-indigo-600' : 'text-gray-900' }}
                    {{ $i < 7 ? 'after:content-[\'\'] after:w-full after:h-0.5 after:inline-block after:absolute' : '' }}
                    {{ $currentStep > $i ? 'after:bg-indigo-600' : 'after:bg-gray-200' }} lg:after:top-5 after:top-3 after:left-4">
                    <div class="block whitespace-nowrap z-10">
                        <span class="w-6 h-6 {{ $currentStep >= $i ? 'bg-indigo-600 text-white' : 'bg-gray-50 text-gray-900' }}
                            border-2 {{ $currentStep >= $i ? 'border-transparent' : 'border-gray-200' }}
                            rounded-full flex justify-center items-center mx-auto mb-3 text-sm lg:w-10 lg:h-10">
                            {{ $i }}
                        </span> Step {{ $i }}
                    </div>
                </li>
            @endfor
        </ol>

        <!-- Step Content -->
        <div class="mt-8 p-6 bg-white shadow rounded-md">
            @if ($currentStep == 1)
                <h2 class="text-xl font-semibold mb-4">Step 1: Which Degree?</h2>
                <div class="grid grid-cols-2 gap-4">
                    @foreach (['Bachelor\'s', 'Master\'s', 'Diploma', 'Other'] as $degree)
                        <button type="button" wire:click="setDegree('{{ $degree }}')"
                            class="p-4 border rounded-lg hover:bg-gray-100 {{ $degree == $selectedDegree ? 'bg-blue-100 border-blue-500' : '' }}">
                            {{ $degree }}
                        </button>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
