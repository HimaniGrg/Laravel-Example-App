<x-layout>
    <x-slot:heading> Register </x-slot:heading>
 
<form method="POST" action="/register">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        
        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <x-form-label for="first_name">First Name</x-form-label>
            <div class="mt-2">
              <x-form-input name='first_name' required />

             <x-form-error name="first_name"/>
            </div>
          </div>
  
          <div class="col-span-full">
            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
            <div class="mt-2">
                <x-form-input name='last_name' required />

             <x-form-error name="last_name"/>
            </div>
        </div>

        <div class="col-span-full">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
                <x-form-input name='email' type='email' required />

             <x-form-error name="email"/>
            </div>
        </div>

        <div class="col-span-full">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            <div class="mt-2">
                <x-form-input name='password' type='password' required />

            <x-form-error name="password"/>
            </div>
        </div>

        <div class="col-span-full">
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900"> Confirm Password</label>
            <div class="mt-2">
                <x-form-input name='password_confirmation' type='password' required />

            <x-form-error name="password_confirmation"/>
            </div>
        </div>

      </div>
      
    </div>
</div>
      
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href='/' class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
      <x-form-button type="submit">Register</x-form-button>
    </div>

  </form>
  
</x-layout>