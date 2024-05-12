export type PostMedia = {
  copyright?: string;
  date?: string;
  explanation?: string;
  hdurl?: string;
  media_type?: string;
  service_version?: string;
  title?: string;
  url?: string;
};

export type RootStackParams = {
  Home: undefined;
  Details: PostMedia;
};

export type ViewButtonTypes = {
  screen: string;
  mediaData: PostMedia
}