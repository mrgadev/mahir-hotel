@extends('layout.frontpage')
@push('addons-style')
<style>
    #mainNavbar.scrolled {
        position: fixed;
        top: 20px;
        left: 100px;
        right: 100px;
        z-index:1;
        background-color: white;
        border-radius: 25px;
        border: 2px solid #976033;
        /* width: 100%; */
        padding: 1.5rem 2.75rem;
        transition: all 0.5s ease;
    }

    #mainNavbar.scrolled p {
        color: #976033;
    }
    #mainNavbar.scrolled a {
        color: #333;
        transition: all 0.4s ease;
    }
    #mainNavbar.scrolled a:hover {
        color: #976033;
        transition: all 0.4s ease;
    }

    #mainNavbar.scrolled .auth-button a:first-child {
        background-color: #976033;
        color: #fff
    }

    #mainNavbar.scrolled .auth-button a:nth-child(2) {
        border: 2px solid #976033;
        color: #976033;
        transition: all 0.4s ease;
    }

    #mainNavbar.scrolled .auth-button a:nth-child(2):hover {
        background-color: #976033;
        color: #fff;
        transition: all 0.4s ease;
    } 
    
    option {
        padding: 2rem;
    }
</style>
@endpush
@section('title', 'Beranda')
@section('main')
<header class="lg:px-24 px-12 bg-hero-bg bg-fixed bg-cover relative w-screen h-screen">
    {{-- <div class="absolute h-screen w-full bg-[#162034] opacity-70 z-10"></div> --}}
    <nav class=" duration-500 transition-all flex items-center justify-between py-6 text-white" id="mainNavbar">
        <p class="text-lg font-medium">Mahir Hotel</p>
        <div class="lg:flex gap-8 font-light hidden">
            <a href="#" class="hover:font-medium">Beranda</a>
            <a href="#" class="hover:font-medium">Promo</a>
            <a href="#" class="hover:font-medium">Layanan Lainnya </a>
            <a href="#" class="hover:font-medium">Kontak</a>
            <a href="#" class="hover:font-medium">Tentang Kami</a>
        </div>
        <ion-icon name="menu-outline" class="lg:hidden text-4xl" ></ion-icon>
        <div class=" items-center gap-3 auth-button hidden lg:flex">
            <a href="#" class="bg-white text-primary-500 px-5 py-2 rounded-full hover:bg-white transition-all">Daftar</a>
            <a href="#" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-primary-500 transition-all">Masuk</a>
        </div>
    </nav>
    <div class="hidden bg-white absolute w-screen h-screen top-0 left-0 z-20 px-11">
        {{-- <div class="flex items-center justify-between py-6">
            <p class="text-primary-500">Mahir Hotel</p>
            <span class="material-symbols-rounded">
                close
                </span>
        </div> --}}
        {{-- <div class="flex md:flex-row flex-col gap-3 font-light">
            <p>Beranda</p>
            <p>Promo</p>
            <p>Layanan Lainnya</p>
            <p>Kontak</p>
            <p>Tentang Kami</p>
            <div class="flex items-center gap-3 mt-10">
                <a href="#" class="bg-primary-500 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-all">Daftar</a>
                <a href="#" class="px-5 py-2 border border-primary-500 text-primary-500 rounded-full hover:bg-primary-500 hover:text-white transition-all">Masuk</a>
            </div>
        </div> --}}
    </div>

    <section class="main h-[90%] flex flex-col justify-center gap-3 relative">
        <h1 class="text-5xl text-white">Liburan impian Anda<br>dimulai di sini!</h1>
        <p class=" text-white">Mahir Hotel menawarkan kenyamanan dan kemewahan yang tiada duanya,<br> dengan fasilitas kelas dunia dan layanan istimewa, kami siap menyambut Anda.</p>
        <form action="" class="hidden mt-5 bg-white p-5 lg:flex items-center justify-between w-1/2 rounded-xl">
            <div class="flex items-center gap-8">
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Pilih Kamar</label>
                    <select name="" class="outline-none text-lg" id="">
                        <option value="" class="p-2 ">Pilih Kamar</option>
                        <option value="">Standard</option>
                        <option value="">Platinum</option>
                        <option value="">Premium</option>
                    </select>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-in</label>
                    <input type="date">
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <label for="" class="text-sm">Check-out</label>
                    <input type="date" name="" id="">
                </div>
            </div>
            <button class="text-white bg-primary-500 w-fit px-5 py-3 rounded-full">
                Pesan sekarang
            </button>
        </form>
        <button class="text-white bg-primary-500 w-fit px-5 py-3 rounded-full block lg:hidden" id="openBookingForm">Pesan sekarang</button>
        <div class="inset-0 z-50 bg-gray-500 bg-opacity-75 fixed lg:hidden flex flex-col items-center justify-center min-h-screen w-screen" id="bookingForm">
            <form class="bg-white w-[90%] rounded-xl p-5">
                <h2 class="text-xl font-semibold mb-3 text-primary-500">Booking sekarang!</h2>
                <div class="grid grid-cols-1 gap-2 w-full rounded border border-gray-400 p-2">
                    <label for="#rooms">Pilih Kamar</label>
                    <span class="material-symbols-rounded">meeting_room</span>
                    <select name="rooms" id="rooms" class="">
                        <option value="Pilih kamar">&#xeb4f; Pilih kamar</option>
                        {{-- <p>Pilih kamar</p> --}}
                        <option value="Standar">Standar</option>
                        <option value="Premium">Premium</option>
                        <option value="Platinum">Platinum</option>
                    </select>
                </div>
                <div class="flex items-center gap-2 mt-3">
                    <button class="px-5 py-2 border border-primary-500 text-primary-500 rounded-full hover:bg-primary-500 hover:text-white transition-all" id="closeBookingForm">Batal</button>
                    <button class="bg-primary-500 text-white px-5 py-2 rounded-full hover:bg-primary-700 transition-all">Pesan</button>
                </div>
            </form>

        </div>
    </section>
</header>
<div class="px-24 py-6">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-1 my-5">
            <p class=" text-primary-500">Temukan</p>
            <p class="text-2xl">Rekomendasi Kamar</p>
        </div>
        <a href="#" class="px-5 py-3 rounded-full text-white bg-primary-500 transition-all hover:bg-primary-700">Lihat semua</a>
    </div>

    <div class="flex overflow-x-scroll no-scrollbar">
        <div class="flex flex-nowrap gap-10 ">
            
            <div class="w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[325px] flex items-end justify-between p-5 rounded-xl">
                    <div>
                        <h2 class="font-medium text-gray-700">Standard Room</h2>
                        <div class="flex items-center gap-3 text-xs my-3">
                            <span class="material-symbols-rounded text-[10px]">restaurant</span>
                            <span class="material-symbols-rounded text-sm">bathtub</span>
                            <span class="material-symbols-rounded text-xs leading-none">wifi</span>
                        </div>
                        <p class="text-xl">IDR 500K</p>
                    </div>
                    <a href="#" class="items-end">Pesan</a>
                </div>
            </div>

            <div class="w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[325px] p-3 rounded-xl">
                    <h2 class="font-medium text-gray-700">Standard Room</h2>
                    <div class="flex items-center gap-3 text-xs my-3">
                        <span class="material-symbols-rounded text-[10px]">restaurant</span>
                        <span class="material-symbols-rounded text-sm">bathtub</span>
                        <span class="material-symbols-rounded text-xs">wifi</span>
                    </div>
                    <p>IDR 500K</p>
                </div>
            </div>
            
            <div class="w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[325px] p-3 rounded-xl">
                    <h2 class="font-medium text-gray-700">Standard Room</h2>
                    <div class="flex items-center gap-3 text-xs my-3">
                        <span class="material-symbols-rounded text-[10px]">restaurant</span>
                        <span class="material-symbols-rounded text-sm">bathtub</span>
                        <span class="material-symbols-rounded text-xs">wifi</span>
                    </div>
                    <p>IDR 500K</p>
                </div>
            </div>

            <div class="w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[325px] p-3 rounded-xl">
                    <h2 class="font-medium text-gray-700">Standard Room</h2>
                    <div class="flex items-center gap-3 text-xs my-3">
                        <span class="material-symbols-rounded text-[10px]">restaurant</span>
                        <span class="material-symbols-rounded text-sm">bathtub</span>
                        <span class="material-symbols-rounded text-xs">wifi</span>
                    </div>
                    <p>IDR 500K</p>
                </div>
            </div>

            <div class="w-[350px] h-[450px] bg-white rounded-xl bg-[url('https://images.unsplash.com/photo-1531835551805-16d864c8d311?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover relative">
                <div class="bg-white absolute bottom-3 left-3 right-3 w-[325px] p-3 rounded-xl">
                    <h2 class="font-medium text-gray-700">Standard Room</h2>
                    <div class="flex items-center gap-3 text-xs my-3">
                        <span class="material-symbols-rounded text-[10px]">restaurant</span>
                        <span class="material-symbols-rounded text-sm">bathtub</span>
                        <span class="material-symbols-rounded text-xs">wifi</span>
                    </div>
                    <p>IDR 500K</p>
                </div>
            </div>
            

        </div>
    </div>

    <div class="flex flex-col items-center justify-center gap-1 my-10">
        <p class="text-primary-500 font-medium">Rasakan</p>
        <h2 class="text-2xl font-medium">Kepuasan Saat Menginap di Hotel Kami</h2>
    </div>
    
    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius doloribus quidem ipsa quibusdam, magni commodi ab molestias numquam necessitatibus, explicabo aliquid fugit perferendis dolores. Aliquam et magni consequatur labore minus nemo recusandae placeat enim laudantium provident nam ullam, fugit sapiente voluptatibus voluptas pariatur quas dolorem facere! Aliquam eaque earum id impedit ea nihil nisi maxime dolore deserunt? Nulla labore distinctio eveniet quaerat quibusdam minus earum maiores necessitatibus aut assumenda. Aperiam maiores id non beatae deleniti minus ratione molestias nam atque eveniet doloremque modi maxime provident quia inventore dicta ab dolore rem, asperiores, repellendus qui fugit nihil ullam! Repellendus inventore voluptatibus, illum odit quae magnam quam. Aut, modi placeat ex voluptatibus, aliquid praesentium totam at mollitia explicabo culpa nulla dignissimos error nam qui reprehenderit consectetur earum quasi exercitationem reiciendis veniam fugit repellendus? Quisquam dicta reprehenderit et libero cumque veniam hic, perspiciatis, nulla non adipisci accusantium tenetur! Nesciunt eaque quos, sit, alias modi esse aspernatur assumenda ratione nulla explicabo neque libero labore sapiente. Recusandae, porro? Ipsum voluptatum totam recusandae dolore ut excepturi eius saepe? Facere repudiandae eaque enim sunt. Ipsam, animi architecto. Sequi ea praesentium eum eos quidem amet harum repudiandae quod reprehenderit magni officia error nulla officiis perspiciatis, quo laborum aut aliquam debitis vel, hic sed animi architecto deleniti vitae. Dignissimos deleniti tempora veniam perspiciatis architecto quaerat, nulla eveniet vero atque itaque sunt nesciunt, minima incidunt adipisci hic enim ratione sequi corrupti facere, earum natus. Praesentium sequi dolorem sed enim pariatur sunt, ducimus placeat aliquid deleniti id et eveniet quisquam provident impedit? Alias vel qui reprehenderit maxime tenetur, architecto fugit. Culpa nobis accusamus id est aut consequuntur aperiam autem sint fuga ex provident, illum reiciendis omnis modi natus rerum sed incidunt porro deserunt delectus ipsam nisi. Omnis, esse temporibus nemo magni quasi explicabo illum placeat quae, ipsam, saepe sint quia quidem totam. Nulla labore eum sunt rem iste harum est id. Laudantium quas quisquam numquam delectus ex nesciunt animi hic. Unde delectus ipsam ullam, asperiores tenetur, nulla, maxime similique nobis aliquid at iusto adipisci! Ipsam laborum porro molestias, culpa expedita, architecto suscipit ut sint eos accusamus voluptatum repellendus dicta dolore impedit consequuntur quidem, necessitatibus adipisci nulla maxime officia atque facere. Laboriosam similique perspiciatis totam doloribus, praesentium nemo consectetur omnis libero assumenda ratione. Quod, blanditiis obcaecati autem eligendi sint accusantium quis repellat quaerat commodi cupiditate vero tempora, perferendis aperiam enim! Sunt nemo mollitia rem vitae iure quod odio eaque, nisi debitis adipisci impedit, nesciunt quas! Exercitationem id recusandae aspernatur libero commodi fuga nesciunt maiores nisi repellendus perferendis corrupti numquam aut delectus asperiores nemo consequuntur saepe, quibusdam, necessitatibus ipsam nihil deleniti. Temporibus sequi exercitationem, numquam voluptates mollitia iure labore sapiente neque qui repellat fugit corporis quasi tempora libero blanditiis cum quas quos necessitatibus! Itaque cumque odio iste quos aliquam similique recusandae architecto ipsum suscipit iusto nihil doloribus nam, ea, nobis amet magni quod ducimus? Minima, quae impedit consectetur corrupti tenetur maiores. Pariatur veritatis harum aliquid ex quibusdam neque soluta, doloribus obcaecati et possimus voluptatem cumque deserunt laudantium perspiciatis ut iure corrupti culpa veniam officia ullam similique adipisci? Minima molestiae accusamus illo et, cumque accusantium earum, nisi assumenda dicta ipsum quidem. Quaerat illum debitis ipsa, consequatur laborum saepe! Sit aspernatur maxime reprehenderit saepe autem quia, pariatur qui et, blanditiis aliquid voluptatibus distinctio atque ea libero impedit iure repudiandae tenetur mollitia tempore molestiae similique sapiente cum omnis dignissimos? Itaque, commodi vero. Officiis debitis repudiandae distinctio aspernatur omnis cupiditate illo natus, veniam corrupti ab libero suscipit, dignissimos velit, nesciunt facere dolorum placeat unde inventore! Eveniet quae blanditiis accusamus exercitationem ipsam ex porro placeat expedita aut delectus odio cumque dolore assumenda harum, incidunt illo pariatur magni praesentium itaque. Velit corrupti repudiandae et minus impedit quisquam, iure officia doloribus ex alias eveniet, animi omnis sit laborum nisi voluptates officiis repellendus, atque odit sequi maiores maxime cupiditate? Placeat nam vitae maiores optio dolore incidunt iusto numquam quod. Vel a earum maiores! Fugit neque repellendus corrupti natus aspernatur modi ipsum ullam sint soluta quos quae temporibus quam nulla asperiores nam inventore qui harum dolorem aut, quo aliquid adipisci. Repellendus velit assumenda vel fugiat pariatur delectus at nobis ratione doloremque expedita quis recusandae iure nihil, commodi quibusdam! Delectus molestias blanditiis fugit at possimus unde quas quo nulla incidunt, eaque dolore pariatur illum, dolor asperiores repellat ad porro omnis nisi quaerat debitis deserunt, facilis architecto? Totam adipisci, libero rerum voluptatibus iure accusamus exercitationem? Dignissimos corrupti mollitia aperiam voluptatum ab, aut nobis consectetur at et accusantium asperiores laudantium a illum totam molestiae. Fuga consectetur, laudantium nemo ex quaerat rem facilis laborum dolorum nihil natus, neque culpa. Deleniti ipsa laudantium delectus molestiae neque dolores ullam minus minima placeat sequi adipisci expedita tempore et accusamus non quod ipsum vel doloremque quasi doloribus, nulla eveniet! Culpa, magni laudantium veritatis quas qui at. Perferendis ex praesentium voluptatem dolorem excepturi debitis, qui itaque, maiores ad architecto minus maxime, facilis magni unde aliquid voluptas vero? In est eveniet at amet veniam, temporibus excepturi eligendi placeat? Nulla repudiandae saepe minus ipsum deleniti asperiores libero vitae fuga quod magnam! Vero eaque tempore reprehenderit beatae corrupti sit veniam itaque soluta tenetur molestias porro placeat laboriosam alias, officiis illum inventore temporibus perspiciatis illo est fuga pariatur. Excepturi natus fugit voluptatum! Magnam numquam molestias officiis atque velit cupiditate sit impedit nostrum, nisi natus, perspiciatis iste id delectus quibusdam error amet, laudantium accusantium sint provident temporibus nulla optio. Nihil, dicta ea debitis ut quia deleniti pariatur ab ratione dolorem quae impedit corporis eius et labore consectetur dolorum quisquam! Impedit debitis modi, deleniti quas sunt iusto quisquam placeat magni soluta minus ad similique! Unde aperiam adipisci accusantium asperiores culpa? Quisquam cum repellendus in est, quis atque rerum rem itaque vitae aliquid, suscipit exercitationem quaerat non blanditiis at enim? Quibusdam placeat suscipit, magnam odit hic reiciendis pariatur labore eos sunt assumenda culpa nihil omnis est quod veniam accusamus quas. Debitis quaerat autem consequuntur molestiae, fuga alias illum maxime. Quis veritatis mollitia nostrum reiciendis fuga minima, excepturi quidem quos aspernatur cupiditate minus alias eaque laboriosam ipsa earum illum modi adipisci asperiores, aliquam, doloribus maxime! Dolore obcaecati beatae aperiam aliquid incidunt vel sit omnis perferendis ratione! Ratione quis explicabo, molestiae voluptatibus atque dolorum eos corrupti earum natus! Delectus quidem nobis voluptates aliquid officia iusto, similique exercitationem placeat itaque laboriosam quaerat sapiente voluptatum dicta est harum molestias praesentium? Nobis quam autem ab praesentium repudiandae consequatur quos saepe cum suscipit consectetur quod libero ratione nam est optio ad officia commodi, ut non possimus debitis voluptates expedita? Ullam perferendis ipsam quidem dicta voluptatibus cumque illum suscipit laboriosam est dolore in fugiat deleniti, consequatur excepturi rem, molestias odio. Consectetur odio porro, inventore, ex perferendis deleniti autem rerum doloribus error aliquid sint quaerat doloremque maxime itaque dolorem alias illo distinctio sapiente animi? Velit vel at tenetur ipsam harum ullam quas et dolorum? Officia voluptates aperiam fugit rem et similique sit sequi molestias, velit quibusdam eveniet modi laborum repellendus facere porro? Repellat quod optio corporis maxime vero quam, quo culpa tenetur libero rerum pariatur accusamus itaque eius quaerat eum? Labore fugiat iure, expedita incidunt modi maxime impedit! Quam voluptatibus pariatur eos deserunt debitis facilis temporibus cupiditate sapiente odio in quasi voluptate quod doloremque numquam dignissimos possimus similique magni eveniet harum deleniti libero dolor, eaque amet commodi! Ea atque, explicabo tenetur ut quibusdam laboriosam non? Libero, assumenda tempora, quidem harum facere sit tempore molestiae commodi qui officiis praesentium veritatis beatae alias minima omnis fuga in a, cumque architecto neque dolores. Sequi voluptate exercitationem inventore cupiditate nam eveniet unde id distinctio aut? Perspiciatis soluta, porro quisquam, iusto consequuntur quia repudiandae ducimus sequi eos excepturi magni nesciunt ab veniam eveniet blanditiis doloremque quam facere ullam molestiae dignissimos dolorem veritatis aliquam. Eos a vitae ex sit ullam accusamus architecto exercitationem, at rem voluptas suscipit fuga, tempora incidunt dolorum quam, excepturi qui amet est porro quaerat quisquam iusto voluptate. Excepturi similique aliquam iusto quos sed, soluta ab vitae dicta eum quae possimus, at unde cumque pariatur ea dolore delectus recusandae optio placeat molestiae expedita! Quod consequatur iste neque, ullam similique quis fugiat? Totam, veniam nemo illum sapiente aut ipsa cum ratione, beatae sunt itaque est hic quibusdam optio dolor numquam nisi natus veritatis voluptate, cupiditate eaque? Dolore exercitationem inventore quasi a culpa sapiente minima consequatur et perferendis mollitia ea temporibus earum excepturi dolorem debitis sed iste eum adipisci vel accusamus, autem fuga assumenda! Quo, id, voluptatum, inventore officia perspiciatis asperiores deserunt optio aliquam quibusdam illo ipsum sit minima enim neque unde autem ab libero quidem qui placeat explicabo dignissimos. Adipisci pariatur odio repudiandae est aperiam mollitia quaerat ea, soluta repellat esse et sit sed vero eveniet quam quisquam corrupti quos, obcaecati libero praesentium quasi dignissimos voluptates blanditiis? Porro numquam hic eum fuga harum, voluptates expedita, rerum nulla in sint aliquam id soluta sit ut quidem asperiores tenetur tempore odit ratione fugit. Possimus dolorum perferendis laborum, suscipit aliquid culpa enim optio amet nisi vel dolor natus doloribus fugit at dolorem debitis vero distinctio, tenetur voluptates quas odio accusantium! Harum vero temporibus amet, nesciunt fugit officia velit dolores deleniti aspernatur dolore iste ratione fuga numquam? Aliquid nam ullam, enim dolorem pariatur autem officia eius ipsam officiis facilis culpa doloribus. Commodi amet eligendi fuga neque vitae, incidunt excepturi delectus cum. Repellat, soluta? Exercitationem inventore delectus eum itaque nemo maiores placeat sunt repellat voluptatum. Voluptatem beatae, vel sapiente dicta eaque nostrum molestiae dolorum velit esse est veritatis repellat blanditiis, quaerat animi praesentium qui omnis tempora molestias harum tempore ipsum minima, odio natus. Molestiae suscipit aliquid id sit repellendus totam aut quisquam modi! Minus, ad commodi doloribus est, odio ea odit assumenda nulla alias excepturi voluptatibus ab error animi in necessitatibus enim quaerat! Optio nesciunt placeat dolor error! Voluptate amet animi expedita voluptatum dolorum optio nobis aperiam aliquam, quidem voluptatibus. Cupiditate nostrum dolorum asperiores modi, itaque aspernatur facilis dicta doloribus est corrupti facere quaerat omnis dolore dolores iure nisi voluptatem. Excepturi itaque perspiciatis dolores blanditiis minima ratione? Quae tempora tempore minima, asperiores consequatur alias necessitatibus eos sequi eveniet placeat, sit suscipit laboriosam molestiae iure quia corrupti. Repudiandae nostrum earum quaerat quos adipisci. Accusantium quos nobis totam perspiciatis eius enim! Laboriosam veniam non minima impedit expedita ipsa soluta, molestiae, recusandae veritatis dignissimos vitae at totam obcaecati! Omnis doloremque voluptas recusandae quae dolor consequatur facilis minima, non aspernatur rerum maiores, dolorum dolore asperiores aperiam porro distinctio eius corrupti nisi ipsum enim ut accusamus quo. Vero, natus saepe cumque iure cum voluptatum rem autem quisquam corporis accusantium laboriosam pariatur fugit atque. Obcaecati eos totam voluptatibus eum asperiores adipisci delectus tempore consequuntur unde accusamus quam fugit provident, incidunt fuga consequatur aliquid? Inventore earum similique numquam ad voluptatibus fuga quis explicabo nesciunt beatae obcaecati. Accusamus et, aliquam mollitia odio molestiae deserunt officia expedita esse id ratione non voluptatum nemo fugit dolor laudantium veniam vero, odit obcaecati! Reprehenderit quae ratione vel, rerum illo laudantium. Corporis veritatis, labore cupiditate debitis eligendi nulla odio provident assumenda nesciunt enim! Doloribus ad nemo harum sunt, temporibus inventore ea hic eligendi eos saepe delectus. Quos provident id necessitatibus recusandae facere, doloremque eius nesciunt, pariatur nisi explicabo laudantium fugiat fugit ullam autem soluta ipsum temporibus delectus quidem placeat veniam enim quibusdam. Consectetur saepe facere id qui aliquam tempore vero commodi, nisi vitae pariatur placeat cum aperiam mollitia laudantium minima fugit quos odit deleniti ipsam ea iste voluptates. Esse veniam nihil perferendis architecto, dolor doloribus voluptates ab, laboriosam similique velit eaque magni ea sapiente et inventore aspernatur? Iusto modi ex nam quibusdam atque harum nisi? Officia, nostrum quidem possimus dolore iusto laboriosam sint voluptatem ratione error commodi suscipit cum minus unde beatae dicta? Neque voluptatibus dolores ad atque. Velit, delectus eaque? Aspernatur, praesentium itaque vitae nemo illum sed atque sequi nisi est laborum magnam voluptas a repellendus soluta, et harum fugiat ducimus voluptate accusantium labore hic doloribus quae laboriosam incidunt. In, nihil pariatur dolorum eveniet perferendis sunt ipsam autem quibusdam similique, voluptatibus dicta fugit quas neque. At, ea odit! Neque iure saepe non quae amet sint recusandae similique! Voluptatibus suscipit molestias nostrum est ducimus ea, dolore corporis ad facere magni in earum culpa rem beatae. Harum similique et, vel labore distinctio, maxime iste accusantium ratione, magnam blanditiis iure?</p> --}}
</div>
@endsection
@push('addons-script')
    <script>
        const openBookingForm = document.getElementById('openBookingForm');
        const closeBookingForm = document.getElementById('closeBookingForm');
        const bookingForm = document.getElementById('bookingForm');

        openBookingForm.addEventListener('click', function() {
            bookingForm.classList.remove('hidden');
        });

        closeBookingForm.addEventListener('click', function() {
            bookingForm.classList.add('hidden');
        });

        document.addEventListener('scroll', function() {
            const mainNavbar = document.getElementById('mainNavbar');
            if(window.scrollY > 0) {
                mainNavbar.classList.add('scrolled');
            } else {
                mainNavbar.classList.remove('scrolled');
            }
        })
    </script>
@endpush