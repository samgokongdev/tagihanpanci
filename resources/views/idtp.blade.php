<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            marquee: 'marquee 5s linear infinite',
            marquee2: 'marquee2 25s linear infinite',
          },
          keyframes: {
            marquee: {
              '0%': {
                transform: 'translateX(0%)'
              },
              '100%': {
                transform: 'translateX(-100%)'
              },
            },
            marquee2: {
              '0%': {
                transform: 'translateX(100%)'
              },
              '100%': {
                transform: 'translateX(0%)'
              },
            },
          },
        },
      },
    }
  </script>
</head>

<body class="bg-gray-100">
  <div class="w-full p-8">
    <div class="font-bold text-4xl text-center">
      <div>
        Monitoring Pengawasan Pemeriksaan
      </div>
      <div>
        KPP Penanaman Modal Asing Tiga
      </div>
    </div>
  </div>
  <div class="flex space-x-4 px-4">
    <div class="w-1/2">
      <div class="font-bold text-2xl pb-4">
        Tunggakan Sudah Alokasi Belum Terbit SP2 </div>
      <marquee direction="down" height="300" style="width:100%" scrolldelay="170">
        @foreach ($tp as $t)
          <div class="flex text-lg flex-col text-white p-4 bg-slate-900 my-2 rounded-lg">
            <div class="font-bold">{{ $t->nama_wp }}</div>
            <div class="font-bold">Kode Pemeriksaan : {{ $t->kode_rik }}</div>
            <div class="">{{ $t->periode_1 }} s.d. {{ $t->periode_2 }}</div>
            <div class="">Supervisor : {{ $t->spv1 }}</div>
            {{-- <div class="text-sm">Tim Pemeriksa : {{ $t->kt1 }}, {{ $t->ang1_1 }}, {{ $t->ang2_1 }}</div> --}}
          </div>
        @endforeach
      </marquee>
    </div>
    <div class="w-1/2">
      <div class="font-bold text-2xl pb-4">
        Daftar Tunggakan Lewat Komitmen SPHP
      </div>
      <marquee direction="down" height="300" style="width:100%" scrolldelay="170" onfinish="1">
        @foreach ($tp1 as $t)
          <div class="flex text-lg flex-col text-white p-4 bg-red-900 my-2 rounded-lg">
            <div class="font-bold">{{ $t->nama_wp }} ( {{ $t->kode_rik }} | {{ $t->periode_1 }} s.d.
              {{ $t->periode_2 }} )</div>
            <div class="">Supervisor : {{ $t->spv1 }}</div>
            <div class="">Tim Pemeriksa : {{ $t->kt1 }}, {{ $t->ang1_1 }}, {{ $t->ang2_1 }}</div>
            <div class="">PIC : {{ $t->pic1 }}</div>
            <div class="">KOMITMEN : {{ date('d-M-Y', strtotime($t->target_sphp_idtp)) }}</div>
          </div>
        @endforeach
      </marquee>
    </div>
  </div>
  <div class="flex space-x-4 px-4">
    <div class="w-1/2">
      <div class="font-bold text-2xl pb-4">
        Tunggakan dengan Komitmen SPHP < 14 Hari </div>
          <marquee direction="down" height="300" style="width:100%" scrolldelay="170" onfinish="1">
            @foreach ($tp2 as $t)
              <div class="flex text-lg flex-col text-white p-4 bg-orange-700 my-2 rounded-lg">
                <div class="font-bold">{{ $t->nama_wp }} ( {{ $t->kode_rik }} | {{ $t->periode_1 }} s.d.
                  {{ $t->periode_2 }} )</div>
                <div class="">Supervisor : {{ $t->spv1 }}</div>
                <div class="">Tim Pemeriksa : {{ $t->kt1 }}, {{ $t->ang1_1 }}, {{ $t->ang2_1 }}
                </div>
                <div class="">PIC : {{ $t->pic1 }}</div>
                <div class="">KOMITMEN : {{ date('d-M-Y', strtotime($t->target_sphp_idtp)) }}</div>
              </div>
            @endforeach
          </marquee>
      </div>
      <div class="w-1/2">
        <div class="font-bold text-2xl pb-4">
          Jadwal Gelar Perkara < 14 Hari </div>
            <marquee direction="down" height="300" style="width:100%" scrolldelay="170" onfinish="1">
              @foreach ($gp as $g)
                <div class="w-full p-4 bg-blue-900 text-white my-4 rounded-lg">
                  <div class="text-center font-bold text-lg">Tanggal GP :
                    {{ date('d-M-Y', strtotime($g->tgl_gp_fix)) }}</div>
                  <div class="text-center font-bold text-lg">Mulai : {{ date('H:i', strtotime($g->tgl_gp_fix)) }} WIB
                  </div>
                  <div class="font-bold text-xl">{{ $g->nama_wp }} ({{ $g->kode_rik }} | {{ $g->periode_1 }} -
                    {{ $g->periode_2 }})</div>
                  <div class="font-bold text-lg">PEMERIKSA : {{ $g->spv1 }}, {{ $g->kt1 }},
                    {{ $g->ang1_1 }}, {{ $g->ang2_1 }}
                  </div>
                  <div class="font-bold text-lg">WASKON : {{ $g->kasi }}, {{ $g->ar }}</div>
                  <div class="font-bold text-lg">PENILAI : {{ $g->penilai }}</div>
                  <div class="font-bold text-lg">PENYULUH : {{ $g->penyuluh }}</div>
                  <div class="font-bold text-lg">NOTULEN : {{ $g->notulen }}</div>
                  <div class="font-bold text-lg">PIC : {{ $g->pic }}</div>
                </div>
              @endforeach
            </marquee>
        </div>
      </div>
    </div>
</body>

</html>
