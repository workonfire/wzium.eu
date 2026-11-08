document.querySelectorAll(".audio-player").forEach(player => {
    const audio = player.querySelector(".audio");
    const playBtn = player.querySelector(".play-btn");
    const playIcon = player.querySelector(".play-icon");
    const progress = player.querySelector(".progress");
    const volume = player.querySelector(".volume");
    const currentTime = player.querySelector(".current-time");
    const duration = player.querySelector(".duration");

    function formatTime(seconds) {
        if (!Number.isFinite(seconds)) return "0:00";

        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);

        return `${mins}:${String(secs).padStart(2, "0")}`;
    }

    function updateDuration() {
        if (
            Number.isFinite(audio.duration) &&
            audio.duration > 0
        ) {
            duration.textContent = formatTime(audio.duration);
        }
    }

    playBtn.addEventListener("click", async () => {
        if (audio.paused) {
            try {
                await audio.play();
            } catch (error) {
                console.error("Playback error:", error);
            }
        } else {
            audio.pause();
        }
    });

    audio.addEventListener("play", () => {
        playIcon.textContent = "Ⅱ";
        playBtn.setAttribute("aria-label", "Pause");
    });

    audio.addEventListener("pause", () => {
        playIcon.textContent = "▶";
        playBtn.setAttribute("aria-label", "Play");
    });

    audio.addEventListener("loadedmetadata", updateDuration);
    audio.addEventListener("durationchange", updateDuration);

    audio.addEventListener("timeupdate", () => {
        if (!Number.isFinite(audio.duration) || audio.duration <= 0) return;

        progress.value =
            (audio.currentTime / audio.duration) * 100;

        currentTime.textContent = formatTime(audio.currentTime);
    });

    progress.addEventListener("input", () => {
        if (!Number.isFinite(audio.duration) || audio.duration <= 0) return;

        audio.currentTime =
            (progress.value / 100) * audio.duration;
    });

    audio.volume = Number(volume.value);

    volume.addEventListener("input", () => {
        audio.volume = Number(volume.value);
    });

    audio.addEventListener("ended", () => {
        progress.value = 0;
        currentTime.textContent = "0:00";
        playIcon.textContent = "▶";
        playBtn.setAttribute("aria-label", "Play");
    });

    audio.addEventListener("error", () => {
        console.error(
            "Audio loading error:",
            audio.error?.code,
            audio.error?.message
        );
    });

    updateDuration();
});
