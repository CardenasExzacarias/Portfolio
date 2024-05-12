import { FC } from "react";
import { Image, StyleSheet, View } from "react-native";

import YoutubePlayer from "react-native-youtube-iframe";

import { PostMedia } from "../../types";

const DisplayMedia: FC<PostMedia> = ({ url, media_type }) => {
  let media;

  if (media_type === "video" && url !== undefined) {
    const videoIdEnd = url.indexOf("?");
    const videoIdStart = url.indexOf("embed/");
    media = (
      <View style={style.videoContainer}>
        <YoutubePlayer
          height={250}
          play={false}
          videoId={url.substring(videoIdStart + 6, videoIdEnd)}
        />
      </View>
    );
  } else {
    media = (
      <View style={style.imageContainer}>
        <Image source={{ uri: url }} style={style.image} />
      </View>
    );
  }

  return media;
};

const style = StyleSheet.create({
  imageContainer: { margin: 10 },
  image: { width: "100%", height: 250, borderRadius: 16 },
  videoContainer: { marginTop: 5, marginHorizontal: 5 },
});

export default DisplayMedia;
