

<form action="/tweety/tweets"  class=" border shadow border-info p-2  rounded" method="POST">
    @csrf
    <textarea name="body" id="" cols="" rows="4" class=" rounded px-2 textarea w-100 border-0 " placeholder="whats up..?" ></textarea>
    <div class="d-flex justify-content-between p-2 border-top rounded ">
        <img src="{{auth()->user()->avatar }}" alt="" class="avater rounded-circle">
        <input type="submit" value="Tweet" class="btn-info font-weight-bold text-monospace px-5   btn  text-white   rounded-pill">

    </div>

    @error('body')
        <p class="text-danger text-center">{{ $message }}</p>
    @enderror
</form>

