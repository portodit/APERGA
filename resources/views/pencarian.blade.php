@extends('template2')

@section('title', 'Pencarian PRT')

@section('navbar')
@endsection

@section('konten')
    <div class="kotak-hitam">
        <div class="carikan">
            <a href="javascript:void(0);" onclick="window.history.back();">
                <img src="{{ asset('images/arrowwhite.png') }}" class="arrows-img" alt="Arrow">
            </a>
            <div class="cari-title">Pencarian PRT</div>
        </div>

        <div class="kotakpencarian">
            <img src="{{ asset('images/searchblack.png') }}" class="search-img" alt="Search Icon">
            <form method="GET" action="{{ route('pencarian') }}">
                <input type="text" class="search-bar" id="search-input" name="keyword"
                    placeholder="Ketikkan pencarian PRT" value="{{ session('keyword', '') }}">
                <div class="tombolcari">
                    <button type="submit" class="tombolcari-button" id="search-button">Search</button>
                </div>
            </form>
        </div>

        <button class="filter-button">
            <img src="{{ asset('images/filterr.png') }}" class="filter-img" alt="Filter Icon">
        </button>


    </div>

    <div class="list-prt">
        <div class="row">
            @php
                $prtsArray = $prts->toArray();
                shuffle($prtsArray['data']); // Mengacak urutan data
            @endphp

            @foreach ($prts as $prt)
                @php
                    $imagePath = 'images/prt/prt' . $prt['id'] . '.jpg';
                    $imageURL = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/bigprofile.png');
                @endphp
                <div class="prt-item" data-nama="{{ $prt['nama'] }}" data-lokasi="{{ $prt['lokasi'] }}">
                    <img src="{{ $imageURL }}" alt="Profile Image" class="person-img">
                    <p class="nama-prt">{{ $prt['nama'] }}</p>
                    <img src="{{ asset('images/location.png') }}" class="lokasi-img" alt="Location Icon">
                    <p class="lokasi">{{ $prt['lokasi'] }}</p>
                    <img src="{{ asset('images/rating.png') }}" class="rating-img" alt="Rating Icon">
                    <p class="ratingtext">{{ $prt['rating'] }}/5</p>
                    <a href="{{ url('detail-pekerja', $prt['id']) }}" class="cek-selengkapnya">
                        Cek Selengkapnya
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm">
            <li class="page-item"><a class="page-link" href="{{ $prts->previousPageUrl() }}">Previous</a></li>
            @foreach (range(1, $prts->lastPage()) as $page)
                <li class="page-item"><a class="page-link"
                        href="{{ $prts->url($page) }}&amp;keyword={{ session('keyword') }}">{{ $page }}</a></li>
            @endforeach
            <li class="page-item"><a class="page-link" href="{{ $prts->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>

    <div id="filter-component" class="frame-387 screen" data-id="1085:7202">

        <body style="margin: 0; background: #ffffff00">
            <input type="hidden" id="anPageName" name="page" value="frame-387" />
            <div class="container-center-horizontal">
                <div class="frame-387 screen" data-id="1085:7202">
                    <div class="filter-popup-SaCktt" data-id="1085:7203">
                        <div class="kotakputih-h7LbzO" data-id="1085:7204"></div>
                        <p class="temukan-prt-yang-kamu-mau-berdasarkan-h7LbzO body" data-id="1085:7205">
                            Temukan PRT yang kamu mau berdasarkan:
                        </p>
                        <h1 class="title-h7LbzO" data-id="1085:7206">Filter Pencarian PRT</h1>
                        <div class="group-364-h7LbzO" data-id="1085:7207">
                            <div class="rating-pembantu-rumah-tangga-JEr4fS poppins-semi-bold-log-cabin-16px"
                                data-id="1085:7208">
                                Rating Pembantu Rumah Tangga
                            </div>
                            <div class="group-363-JEr4fS group-363" data-id="1085:7209">
                                <div class="rectangle-67" data-id="1085:7210"></div>
                                <p class="pilih-rating-yang-kamu-mau-DRbp9n poppins-normal-log-cabin-16px"
                                    data-id="1085:7211">
                                    Pilih rating yang kamu mau
                                </p>
                            </div>
                        </div>
                        <img class="arrow-down-sign-to-navigate-1-h7LbzO" data-id="1085:7212"
                            src="{{ asset('images/dropdown.png') }}" alt="arrow-down-sign-to-navigate 1" />
                        <div class="group-367-h7LbzO" data-id="1085:7213">
                            <div class="group-365-RleJMF" data-id="1085:7214">
                                <div class="gaji-pembantu-rumah-tangga poppins-semi-bold-log-cabin-16px"
                                    data-id="1085:7215">
                                    Gaji Pembantu Rumah Tangga
                                </div>
                                <div class="group-363-pYorlK group-363" data-id="1085:7216">
                                    <div class="rectangle-67" data-id="1085:7217"></div>
                                    <p class="pilih-kondisi-gaji-yang-kamu-mau poppins-normal-log-cabin-16px"
                                        data-id="1085:7218">
                                        Pilih kondisi gaji yang kamu mau
                                    </p>
                                </div>
                            </div>
                            <div class="group-366-RleJMF group-366" data-id="1085:7219">
                                <div class="gaji-pembantu-rumah-tangga poppins-semi-bold-log-cabin-16px"
                                    data-id="1085:7220">
                                    Gaji Pembantu Rumah Tangga
                                </div>
                                <div class="group-363-cTywxZ group-363" data-id="1085:7221">
                                    <div class="rectangle-67" data-id="1085:7222"></div>
                                    <p class="pilih-kondisi-gaji-yang-kamu-mau poppins-normal-log-cabin-16px"
                                        data-id="1085:7223">
                                        Pilih kondisi gaji yang kamu mau
                                    </p>
                                </div>
                            </div>
                            <img class="arrow-down-sign-to-navigate-2-RleJMF" data-id="1085:7224"
                                src="{{ asset('images/dropdown.png') }}" alt="arrow-down-sign-to-navigate 2" />
                        </div>
                        <div class="usiafilter-h7LbzO" data-id="1085:7225">
                            <div class="group-kqA5tN" data-id="1085:7226">
                                <div class="usia-pembantu-rumah-tangga-cWLXyO poppins-semi-bold-log-cabin-16px"
                                    data-id="1085:7227">
                                    Usia Pembantu Rumah Tangga
                                </div>
                                <div class="group-363-cWLXyO group-363" data-id="1085:7228">
                                    <div class="rectangle-67" data-id="1085:7229"></div>
                                    <p class="pilih-kondisi-gaji-yang-kamu-mau poppins-normal-log-cabin-16px"
                                        data-id="1085:7230">
                                        Pilih kondisi gaji yang kamu mau
                                    </p>
                                </div>
                            </div>
                            <div class="group-366-kqA5tN group-366" data-id="1085:7231">
                                <div class="group-363-UWchDE group-363" data-id="1085:7232">
                                    <div class="rectangle-67" data-id="1085:7233"></div>
                                    <p class="pilih-kondisi-usia-yang-kamu-mau-LJfcZ2 poppins-normal-log-cabin-16px"
                                        data-id="1085:7234">
                                        Pilih kondisi usia yang kamu mau
                                    </p>
                                </div>
                            </div>
                            <img class="arrow-kqA5tN" data-id="1085:7235" src="{{ asset('images/dropdown.png') }}"
                                alt="arrow-down-sign-to-navigate 2" />
                        </div>
                        <div class="cari-prt-h7LbzO" data-id="1085:7236">
                            <div class="cari-prt-sekarang-4xB6e1" data-id="1085:7237">
                                Cari PRT Sekarang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection

@section('footer')
    <div class="space"></div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cari.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}">
    <style>
        #filter-component {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Fungsi untuk menampilkan data PRT sesuai hasil pencarian
        function showFilteredData(prts) {
            var prtItems = $('.prt-item');
            prtItems.hide(); // Sembunyikan semua prt-item

            $.each(prts, function(index, prt) {
                var prtItem = $('.prt-item[data-nama="' + prt.nama + '"][data-lokasi="' + prt.lokasi + '"]');
                prtItem.show(); // Tampilkan prt-item yang cocok dengan hasil pencarian
            });
        }

        // Fungsi untuk melakukan pencarian
        function performSearch() {
            var keyword = $('#search-input').val().toLowerCase().trim();

            // Ubah URL dengan keyword pencarian
            var searchURL = '{{ route('pencarian') }}' + '?keyword=' + keyword;
            history.pushState(null, '', searchURL); // Ubah URL di browser

            // Kirim permintaan pencarian ke backend
            $.ajax({
                url: searchURL,
                type: 'GET',
                success: function(response) {
                    showFilteredData(response.prts); // Tampilkan hasil pencarian
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Mendapatkan tombol pencarian
        var searchButton = document.getElementById('search-button');

        // Menambahkan event listener untuk tombol pencarian
        searchButton.addEventListener('click', function() {
            performSearch();
        });

        // Menghubungkan event keyup pada input pencarian
        $('#search-input').keyup(function(e) {
            if (e.keyCode === 13) {
                performSearch();
            }
        });

        // Mengambil keyword pencarian dari URL saat halaman dimuat
        $(document).ready(function() {
            var searchURLParams = new URLSearchParams(window.location.search);
            var keyword = searchURLParams.get('keyword');
            if (keyword) {
                $('#search-input').val(keyword);
                performSearch();
            }
        });
    </script>

<script>
    // Mendapatkan tombol filter
    var filterButton = document.querySelector('.filter-button');

    // Mendapatkan elemen popup yang ingin ditampilkan
    var popupElement = document.getElementById('filter-component');

    // Variabel untuk mengontrol status tampilan popup
    var popupVisible = false;

    // Menambahkan event listener pada tombol filter
    filterButton.addEventListener('click', function() {
        if (popupVisible) {
            popupElement.style.display = 'none'; // Sembunyikan popup jika sudah terlihat
            popupVisible = false; // Set status tampilan popup menjadi false
        } else {
            popupElement.style.display = 'block'; // Tampilkan popup jika belum terlihat
            popupVisible = true; // Set status tampilan popup menjadi true
        }
    });
</script>

@endpush
