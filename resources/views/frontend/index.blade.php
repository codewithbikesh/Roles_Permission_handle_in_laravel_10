<x-app-web-layout>
    <x-slot:title>
      My Laravel App
    </x-slot>
<div class="py-5">
    <div class="container">
        @php
            $successMessageNew="Saved Successfully";
            $type = 'success';
        @endphp
        <x-alert-message :type="$type" :message="$successMessageNew" />

        <hr>

        <h4>Welcome to index Page</h4>

        <hr>
        {{-- <label for="">My First Name</label> --}}
        <x-form.label value="My First Name" />
        <x-form.label>
            ABC-My First Name
        </x-form.label>
    </div>
</div>
<x-slot name="scripts">
   <script>
    console.log("Welcome to index Page");
   </script>
</x-slot>
</x-app-web-layout>