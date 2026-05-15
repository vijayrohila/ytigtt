@extends('layouts.app')

@section('content')
<main class="px-6 md:px-12 max-w-6xl mx-auto">

  <section class="text-white text-center">
    <div class="max-w-3xl mx-auto space-y-4">

      <p class="text-lg md:text-xl leading-relaxed">
        <a href="https://ytigtt.com/"
          class="text-2xl font-semibold bg-gradient-to-br from-[#134e5e] to-[#71b280] bg-clip-text text-transparent">
          ytigtt.com
        </a>
        is a simple creator discovery platform that randomly spotlights one creator link each day from each network, giving creators a fair and unbiased chance to be discovered by real people.
      </p>

      <p class="font-semibold">
        No bots, just creator discovery.
      </p>

      <p>
        Hope you’ll take a look!
      </p>

    </div>
  </section>

  <section>
    <div class="bg-gray-100 border border-[#71b280] rounded-lg py-8 text-center">
      <p class="text-lg font-semibold mb-4 text-[#134e5e]">Advertisement - 1</p>
      <a href="https://ytigtt.com" target="_blank"
        class="inline-block bg-gradient-to-br from-[#134e5e] to-[#71b280] text-white px-8 py-2 rounded-full">
        www.ytigtt.com
      </a>
    </div>
  </section>

  <section>
    <div class="bg-gray-100 rounded-xl shadow-md px-6 py-8 max-w-2xl mx-auto text-center space-y-3">
      <p class="font-semibold">Live Visitors: <span class="text-red-600 text-4xl">{{ number_format($liveVisitors ?? 0) }}</span></p>
      <p class="font-semibold">Today's Visitors: <span class="text-blue-600">{{ number_format($todayVisitors ?? 0) }}</span></p>
      <p class="font-semibold">Yesterday's Visitors: <span class="text-pink-600">{{ number_format($yesterdayVisitors ?? 0) }}</span></p>
      <p class="font-semibold">Total Visitors: <span class="text-green-600">{{ number_format($totalVisitors ?? 0) }}</span></p>
      <p class="font-semibold">Total Submissions: <span class="text-orange-600">{{ number_format($totalSubmissions ?? 0) }}</span></p>
      <p class="font-semibold">Featured Creators: <span class="text-violet-600">{{ number_format($featuredCreatorCount ?? 0) }}</span></p>
      <p class="font-semibold">Running Date: <span class="text-yellow-600">{{ $runningDate ?? '06-05-2026' }}</span></p>
      <p class="font-semibold">Serving Since: <span class="text-gray-600">04-05-2026</span></p>
    </div>
  </section>

  <section>
    <div class="bg-gray-100 border border-[#71b280] rounded-lg py-8 text-center">
      <p class="text-lg font-semibold mb-4 text-[#134e5e]">Advertisement - 2</p>
      <a href="https://ytigtt.com" target="_blank"
        class="inline-block bg-gradient-to-br from-[#134e5e] to-[#71b280] text-white px-8 py-2 rounded-full">
        www.ytigtt.com
      </a>
    </div>
  </section>

  <section>
    @php
      $ytWinner = $featuredCreators['yt'] ?? null;
      $igWinner = $featuredCreators['ig'] ?? null;
      $ttWinner = $featuredCreators['tt'] ?? null;
    @endphp

    <div class="flex flex-col md:flex-row justify-center items-stretch gap-8">

      <div class="bg-white border border-red-500 rounded-2xl shadow-lg p-6 flex-1 max-w-sm mx-auto flex flex-col justify-between">
        <h4 class="text-center text-2xl font-semibold text-red-600 mb-3">YouTube - YT</h4>

        <p class="text-center text-xs text-gray-600 mb-6">
          YouTube Monthly Active Users - <span class="font-semibold text-red-500">2.6B+</span>
        </p>

        <div class="flex gap-3 mb-6">
          <a href="{{ $ytWinner->winner_link ?? 'https://www.youtube.com/shorts/FjW6ZZGeqZ8' }}" id="ytBtn"
            data-winner-id="{{ $ytWinner->id ?? '' }}"
            class="flex-1 bg-red-500 text-white py-2 rounded-lg text-center font-semibold">
            Featured Creator
          </a>
          <div id="ytClicks" data-initial-clicks="{{ $ytWinner->clicks ?? 0 }}" class="w-24 flex items-center justify-center text-sm rounded-lg border border-red-400 bg-red-100 text-red-700 font-semibold">
            Clicks - {{ number_format($ytWinner->clicks ?? 0) }}
          </div>
        </div>

        <div id="ytFields" class="hidden-fields">
          <input id="ytInput" type="text" placeholder="Paste your YouTube link here...."
            class="w-full border border-gray-400 rounded-md p-2 mb-3
                       text-gray-800 placeholder-gray-500
                       bg-gray-50 focus:bg-white focus:border-red-500 focus:ring-1 focus:ring-red-400" disabled />
          <button id="ytSubmit" class="w-full bg-red-600 text-white py-2 rounded-md font-semibold" disabled>
            Submit
          </button>
        </div>
      </div>

      <div class="bg-white border border-pink-500 rounded-2xl shadow-lg p-6 flex-1 max-w-sm mx-auto flex flex-col justify-between">
        <h4 class="text-center text-2xl font-semibold text-pink-600 mb-3">
          Instagram - IG
        </h4>

        <p class="text-center text-xs text-gray-600 mb-6">
          Instagram Monthly Active Users -
          <span class="font-semibold text-pink-500">2B+</span>
        </p>

        <div class="flex gap-3 mb-6">
          <a href="{{ $igWinner->winner_link ?? 'https://www.instagram.com/p/Bh8psJYH1lq' }}" id="igBtn"
            data-winner-id="{{ $igWinner->id ?? '' }}"
            class="flex-1 bg-gradient-to-r from-pink-500 to-purple-500 text-white py-2 rounded-lg text-center font-semibold">
            Featured Creator
          </a>

          <div id="igClicks" data-initial-clicks="{{ $igWinner->clicks ?? 0 }}"
            class="w-24 flex items-center justify-center text-sm rounded-lg border border-pink-400 bg-pink-100 text-pink-700 font-semibold">
            Clicks - {{ number_format($igWinner->clicks ?? 0) }}
          </div>
        </div>

        <div id="igFields" class="hidden-fields">
          <input id="igInput" type="text" placeholder="Paste your Instagram link here...."
            class="w-full border border-gray-400 rounded-md p-2 mb-3
                       text-gray-800 placeholder-gray-500
                       bg-gray-50 focus:bg-white focus:border-pink-500 focus:ring-1 focus:ring-pink-400" disabled />

          <button id="igSubmit"
            class="w-full bg-gradient-to-r from-pink-600 to-purple-600 text-white py-2 rounded-md font-semibold" disabled>
            Submit
          </button>
        </div>
      </div>

      <div class="bg-white border border-[#FE2C55] rounded-2xl shadow-lg p-6 flex-1 max-w-sm mx-auto flex flex-col justify-between">
        <h4 class="text-center text-2xl font-semibold text-[#FE2C55] mb-3">
          TikTok - TT
        </h4>

        <p class="text-center text-xs text-gray-600 mb-6">
          TikTok Monthly Active Users -
          <span class="font-semibold text-[#FE2C55]">1.9B+</span>
        </p>

        <div class="flex gap-3 mb-6">
          <a href="{{ $ttWinner->winner_link ?? 'https://tiktok.com' }}" id="ttBtn"
            data-winner-id="{{ $ttWinner->id ?? '' }}"
            class="flex-1 bg-[#FE2C55] text-white py-2 rounded-lg text-center font-semibold">
            Featured Creator
          </a>

          <div id="ttClicks" data-initial-clicks="{{ $ttWinner->clicks ?? 0 }}"
            class="w-24 flex items-center justify-center text-sm rounded-lg border border-[#FE2C55] bg-[#25F4EE] text-black font-semibold">
            Clicks - {{ number_format($ttWinner->clicks ?? 0) }}
          </div>
        </div>

        <div id="ttFields" class="hidden-fields">
          <input id="ttInput" type="text" placeholder="Paste your TikTok link here...."
            class="w-full border border-gray-400 rounded-md p-2 mb-3
                       text-gray-800 placeholder-gray-500
                       bg-gray-50 focus:bg-white focus:border-[#FE2C55] focus:ring-1 focus:ring-[#FE2C55]" disabled />

          <button id="ttSubmit"
            class="w-full bg-gradient-to-r from-[#FE2C55] to-[#25F4EE] text-white py-2 rounded-md font-semibold" disabled>
            Submit
          </button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="bg-gray-100 border border-[#71b280] rounded-lg py-8 text-center">
      <p class="text-lg font-semibold mb-4 text-[#134e5e]">Advertisement - 3</p>
      <a href="https://ytigtt.com" target="_blank"
        class="inline-block bg-gradient-to-br from-[#134e5e] to-[#71b280] text-white px-8 py-2 rounded-full">
        www.ytigtt.com
      </a>
    </div>
  </section>

</main>
@endsection

@push('scripts')
<script>
  window.addEventListener("pageshow", (event) => {
    if (event.persisted || performance.getEntriesByType("navigation")[0]?.type === "back_forward") {
      window.location.reload();
    }
  });
</script>

<script>
  const platforms = ['yt', 'ig', 'tt'];
  const DEFAULT_WAIT_TIME = 10000;
  const platformLabels = {
    yt: 'YouTube',
    ig: 'Instagram',
    tt: 'TikTok',
  };
  const submitUrl = '{{ route("submit.link") }}';
  const clickUrl = '{{ route("creator.click") }}';
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  function getPlatformAccess(id) {
    try {
      return JSON.parse(localStorage.getItem(id + 'Access') || 'null');
    } catch (error) {
      return null;
    }
  }

  function setPlatformAccess(id, payload) {
    localStorage.setItem(id + 'Access', JSON.stringify(payload));
  }

  function clearPlatformAccess(id) {
    localStorage.removeItem(id + 'Access');
    localStorage.removeItem(id + 'Unlocked');
  }

  function updateClicks(id, serverClicks = null) {
    const key = id + 'Clicks';
    const current = serverClicks ?? (parseInt(localStorage.getItem(key) || '0', 10) + 1);
    if (serverClicks === null) {
      localStorage.setItem(key, current);
    }
    document.getElementById(id + 'Clicks').textContent = 'Clicks - ' + current;
  }

  function showFields(id) {
    const field = document.getElementById(id + 'Fields');
    field.classList.remove('hidden-fields');
    field.classList.add('visible-fields');
    const input = document.getElementById(id + 'Input');
    const submit = document.getElementById(id + 'Submit');
    input.disabled = false;
    submit.disabled = false;
    localStorage.setItem(id + 'Unlocked', 'true');
  }

  function hideFields(id) {
    const field = document.getElementById(id + 'Fields');
    field.classList.remove('visible-fields');
    field.classList.add('hidden-fields');
    document.getElementById(id + 'Input').disabled = true;
    document.getElementById(id + 'Submit').disabled = true;
    localStorage.removeItem(id + 'Unlocked');
  }

  function canSubmit(access) {
    if (!access || !access.token || !access.availableAt || !access.leftAtMs) {
      return false;
    }

    const requiredWait = Number(access.waitMs || DEFAULT_WAIT_TIME);
    const waitedInBrowser = Date.now() - Number(access.leftAtMs) >= requiredWait;
    const serverReady = Math.floor(Date.now() / 1000) >= Number(access.availableAt);

    return waitedInBrowser && serverReady;
  }

  async function showEarlyReturnMessage(id, access) {
    const seconds = Math.round(Number(access?.waitMs || DEFAULT_WAIT_TIME) / 1000);
    const platformName = platformLabels[id] || 'creator';
    const linkType = id === 'yt' ? 'video link' : 'link';

    await showMessage(
      'Too fast',
      'Hey Participant, that was too fast. Click again and Watch ' + seconds + ' seconds, to unlock the Submission for your ' + platformName + ' ' + linkType + ' — Thanks!',
      'info'
    );
  }

  function isValidPlatformUrl(id, value) {
    const link = value.trim();

    if (!link) {
      return false;
    }

    const url = /^https?:\/\//i.test(link) ? link : 'https://' + link;

    try {
      const parsed = new URL(url);
      const host = parsed.hostname.toLowerCase().replace(/^www\./, '');

      if (!parsed.pathname || parsed.pathname === '/') {
        return false;
      }

      if (id === 'yt') {
        return ['youtube.com', 'm.youtube.com', 'youtu.be'].includes(host);
      }

      if (id === 'ig') {
        return ['instagram.com', 'm.instagram.com'].includes(host);
      }

      if (id === 'tt') {
        return ['tiktok.com', 'm.tiktok.com', 'vm.tiktok.com', 'vt.tiktok.com'].includes(host);
      }
    } catch (error) {
      return false;
    }

    return false;
  }

  async function parseJsonResponse(response) {
    const text = await response.text();

    try {
      const data = text ? JSON.parse(text) : {};
      if (!response.ok) {
        throw new Error(data.error || data.message || 'Request failed.');
      }

      return data;
    } catch (error) {
      if (error instanceof SyntaxError) {
        throw new Error('Server returned an invalid response. Please refresh and try again.');
      }

      throw error;
    }
  }

  function showMessage(title, text, icon = 'info') {
    if (typeof Swal === 'undefined') {
      window.alert(text || title);
      return Promise.resolve();
    }

    return Swal.fire({
      icon,
      title,
      text,
      confirmButtonText: 'OK',
      confirmButtonColor: '#134e5e',
      background: '#f9fafb',
      color: '#111827',
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: true,
    });
  }

  platforms.forEach(p => {
    const clicksElement = document.getElementById(p + 'Clicks');
    const initialClicks = parseInt(clicksElement.dataset.initialClicks || '0', 10);
    const count = initialClicks || parseInt(localStorage.getItem(p + 'Clicks') || '0', 10);
    document.getElementById(p + 'Clicks').textContent = 'Clicks - ' + count;

    if (localStorage.getItem(p + 'Unlocked') === 'true' && canSubmit(getPlatformAccess(p))) {
      showFields(p);
    } else {
      hideFields(p);
    }
  });

  platforms.forEach(p => {
    document.getElementById(p + 'Btn').addEventListener('click', async e => {
      e.preventDefault();
      const featuredButton = e.currentTarget;
      const featuredHref = featuredButton.href;
      const winnerId = featuredButton.dataset.winnerId || '';

      updateClicks(p);
      hideFields(p);

      const leftAtMs = Date.now();
      setPlatformAccess(p, {
        leftAtMs,
        token: null,
        availableAt: null,
      });
      localStorage.setItem('lastClicked', p);

      const formData = new FormData();
      formData.append('platform', p);
      formData.append('winner_id', winnerId);
      formData.append('_token', csrfToken);

      try {
        const response = await fetch(clickUrl, {
          method: 'POST',
          credentials: 'same-origin',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: formData,
        });
        const data = await parseJsonResponse(response);

        if (!data.success || !data.token) {
          throw new Error(data.error || 'Could not unlock submit box.');
        }

        if (data.clicks !== null && typeof data.clicks !== 'undefined') {
          updateClicks(p, data.clicks);
        }

        setPlatformAccess(p, {
          leftAtMs,
          token: data.token,
          availableAt: data.available_at,
          waitMs: (data.min_view_seconds || 10) * 1000,
        });
        window.location.href = featuredHref;
      } catch (error) {
        clearPlatformAccess(p);
        await showMessage('Could not unlock', error.message || 'Could not unlock submit box. Please try again.', 'error');
      }
    });
  });

  function checkReturnFromRedirect() {
    const lastClicked = localStorage.getItem('lastClicked');
    const access = getPlatformAccess(lastClicked);

    if (lastClicked && access) {
      if (canSubmit(access)) {
        showFields(lastClicked);
        localStorage.removeItem('lastClicked');
      } else {
        clearPlatformAccess(lastClicked);
        hideFields(lastClicked);
        localStorage.removeItem('lastClicked');
        showEarlyReturnMessage(lastClicked, access);
      }
    }
  }

  checkReturnFromRedirect();
  window.addEventListener('focus', checkReturnFromRedirect);
  window.addEventListener('pageshow', checkReturnFromRedirect);
  document.addEventListener('visibilitychange', () => {
    if (document.visibilityState === 'visible') {
      checkReturnFromRedirect();
    }
  });

  platforms.forEach(p => {
    const submitBtn = document.getElementById(p + 'Submit');
    submitBtn.addEventListener('click', async () => {
      const inputVal = document.getElementById(p + 'Input').value.trim();
      const access = getPlatformAccess(p);

      if (!access || !access.token || !canSubmit(access)) {
        hideFields(p);
        await showMessage('Unlock required', 'Click the featured creator first, wait 5 seconds, then submit.', 'warning');
        return;
      }

      if (inputVal === '') {
        await showMessage('Link required', 'Please paste your link before submitting.', 'warning');
        return;
      }

      if (!isValidPlatformUrl(p, inputVal)) {
        await showMessage('Invalid link', 'Please submit a valid ' + platformLabels[p] + ' link only.', 'error');
        return;
      }

      const formData = new FormData();
      formData.append('platform', p);
      formData.append('link', inputVal);
      formData.append('access_token', access.token);
      formData.append('_token', csrfToken);

      try {
        const response = await fetch(submitUrl, {
          method: 'POST',
          credentials: 'same-origin',
          headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: formData,
        });
        const data = await parseJsonResponse(response);

        if (!data.success) {
          throw new Error(data.error || 'Could not submit your link.');
        }

        await showMessage('Submitted', data.message || 'Your link submitted successfully.', 'success');
        clearPlatformAccess(p);
        document.getElementById(p + 'Input').value = '';
        location.reload();
      } catch (error) {
        await showMessage('Error', error.message || 'An error occurred. Please try again.', 'error');
      }
    });
  });
</script>
@endpush
