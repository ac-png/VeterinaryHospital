 <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
 @if(session('failure'))
 <div class="mb-4 px-4 py-2 bg-red-100 border border-red-200 text-red-700 rounded-md">
     {{ $slot }}
 </div>
@endif
