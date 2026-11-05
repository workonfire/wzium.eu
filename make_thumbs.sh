#!/bin/bash

ALBUMS_DIR="./albums"
THUMB_WIDTH=400

for album in "$ALBUMS_DIR"/*/; do
    thumbs_dir="${album}thumbs"
    mkdir -p "$thumbs_dir"

    for img in "$album"*.{jpg,jpeg,png,gif,webp}; do
        [ -f "$img" ] || continue

        base=$(basename "$img")
        name="${base%.*}"
        dest="${thumbs_dir}/${name}.jpg"

        if [ ! -f "$dest" ]; then
            echo "Generating thumbnail for: $dest"
            magick "$img" -resize "${THUMB_WIDTH}x>" -quality 80 "$dest"
        fi
    done
done

echo "Done."