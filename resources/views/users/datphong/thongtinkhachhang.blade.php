  <form id="datPhongForm" method="POST" action="{{ route('datphong.store') }}">

      @csrf

      {{-- THÔNG TIN KHÁCH HÀNG --}}
      <div class="bg-white rounded-2xl shadow p-6 mb-6">

          <h2 class="text-2xl font-bold mb-6">

              Thông tin khách hàng

          </h2>

          <div class="grid md:grid-cols-2 gap-5">

              <div>

                  <label class="block mb-2 font-medium">

                      Họ và tên

                  </label>

                  <input type="text" name="ho_ten" class="w-full border rounded-xl px-4 py-3" required>

              </div>

              <div>

                  <label class="block mb-2 font-medium">

                      Số điện thoại

                  </label>

                  <input type="text" name="so_dien_thoai" class="w-full border rounded-xl px-4 py-3" required>

              </div>

              <div class="md:col-span-2">

                  <label class="block mb-2 font-medium">

                      Email

                  </label>

                  <input type="email" name="email" class="w-full border rounded-xl px-4 py-3" required>

              </div>

          </div>

      </div>