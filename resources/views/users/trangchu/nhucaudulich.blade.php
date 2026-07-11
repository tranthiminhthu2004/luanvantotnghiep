<section class="max-w-7xl mx-auto px-4 lg:px-8 pt-10 lg:pt-12 mb-4">

    {{-- Tiêu đề --}}
    <div class="mb-8 lg:mb-10">

        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#061755]">

            Gợi ý điểm đến theo sở thích

        </h2>

    </div>

    {{-- Card --}}
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm hover:shadow-md transition overflow-hidden">

        <div class="p-5 md:p-8">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                {{-- Nội dung --}}
                <div class="flex-1">

                    <div class="flex items-start md:items-center gap-4">

                        {{-- Icon --}}
                        <div
                            class="w-14 h-14 md:w-16 md:h-16 rounded-2xl bg-blue-100 flex items-center justify-center flex-shrink-0">

                            <i class="fa-solid fa-earth-americas text-2xl md:text-3xl text-[#1040C5]">
                            </i>

                        </div>

                        {{-- Tiêu đề --}}
                        <div>


                            <h3 class="text-xl md:text-3xl font-bold text-[#061755] leading-tight">

                                Khám phá điểm đến dành riêng cho bạn

                            </h3>

                        </div>

                    </div>

                    {{-- Mô tả --}}
                    <p class="mt-5 text-base md:text-base text-slate-600 leading-7 md:leading-8">

                        Dựa trên những sở thích du lịch của bạn ,
                        hệ thống sẽ gợi ý những điểm đến
                        phù hợp nhất với nhu cầu của bạn.

                    </p>

                    {{-- Button --}}
                    <div class="mt-6 flex flex-col sm:flex-row gap-3">

                        @auth

                        <a href="{{ route('sothich.index') }}"
                            class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-3 rounded-xl border border-[#1040C5] text-[#1040C5] hover:bg-blue-50 transition">

                            <i class="fa-solid fa-sliders"></i>

                            Cập nhật sở thích

                        </a>

                        @endauth

                        <a href="{{ route('goiy.index') }}"
                            class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-6 py-3 rounded-xl bg-[#1040C5] hover:bg-blue-700 text-white font-semibold transition">

                            <i class="fa-solid fa-wand-magic-sparkles"></i>

                            Khám phá ngay

                        </a>

                    </div>

                </div>

                {{-- Hình minh họa: quả địa cầu 3D xoay --}}
                <div class="hidden lg:flex justify-center items-center">

                    <div id="goi-y-globe" class="w-40 h-40 xl:w-48 xl:h-48 rounded-full bg-blue-50 overflow-hidden">
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
(function() {

    const container = document.getElementById('goi-y-globe');

    if (!container || typeof THREE === 'undefined') {
        return;
    }

    const size = container.clientWidth || 160;

    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(40, 1, 0.1, 100);
    camera.position.set(0, 0, 3);

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true
    });
    renderer.setSize(size, size);
    renderer.setPixelRatio(window.devicePixelRatio || 1);
    container.appendChild(renderer.domElement);

    const ambient = new THREE.AmbientLight(0xffffff, 0.65);
    scene.add(ambient);

    const sun = new THREE.DirectionalLight(0xffffff, 1.0);
    sun.position.set(3, 2, 4);
    scene.add(sun);

    const fill = new THREE.DirectionalLight(0xffffff, 0.25);
    fill.position.set(-3, -1, -2);
    scene.add(fill);

    const tiltGroup = new THREE.Group();
    tiltGroup.rotation.z = 23.4 * Math.PI / 180;
    scene.add(tiltGroup);

    const earthMaterial = new THREE.MeshPhongMaterial({
        color: 0x9fa9b5,
        shininess: 4
    });
    const earth = new THREE.Mesh(
        new THREE.SphereGeometry(1, 48, 48),
        earthMaterial
    );
    tiltGroup.add(earth);

    new THREE.TextureLoader().load(
        'https://cdn.jsdelivr.net/npm/three-globe/example/img/earth-blue-marble.jpg',
        function(texture) {
            earthMaterial.map = texture;
            earthMaterial.color.set(0xffffff);
            earthMaterial.needsUpdate = true;
        }
    );

    function animate() {
        requestAnimationFrame(animate);
        earth.rotation.y += 0.004;
        renderer.render(scene, camera);
    }
    animate();

    window.addEventListener('resize', function() {
        const newSize = container.clientWidth;
        if (!newSize || newSize === renderer.getSize(new THREE.Vector2()).x) {
            return;
        }
        renderer.setSize(newSize, newSize);
        camera.updateProjectionMatrix();
    });

})();
</script>