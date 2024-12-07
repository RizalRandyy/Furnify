<div class="container">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <div class="col-span-2">
          <img src="{{ Storage::url('images/dashboardGrid/1.jpeg') }}"  alt="First Product Image" class="w-full object-cover h-[633px]">
      </div>
      
      <div class="col-span-1 grid grid-cols-1 gap-6">
          <div class="bg-white">
              <img src="{{ Storage::url('images/dashboardGrid/quotes.jpeg') }}" alt="Second Product Image" class="w-full object-cover h-56">
          </div>
          <div class="bg-white">
              <img src="{{ Storage::url('images/dashboardGrid/lamp.jpeg') }}" alt="Third Product Image" class="w-full object-cover h-96">
          </div>
      </div>
      <div class="col-span-1 grid grid-cols-1 gap-6">
          <div class="bg-white">
              <img src="{{ Storage::url('images/dashboardGrid/bed.jpeg') }}" alt="Fourth Product Image" class="w-full object-cover h-96">
          </div>
          <div class="bg-white">
              <img src="{{ Storage::url('images/dashboardGrid/drawer.jpeg') }}" alt="Fifth Product Image" class="w-full object-cover h-56">
          </div>
      </div>
  </div>
</div>