export function getCurrentPosition(options = {}) {
  if (!navigator.geolocation) {
    throw new Error("Geolocation is not supported.");
  }

  return new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(resolve, reject, {
      enableHighAccuracy: true,
      timeout: 10000,
      maximumAge: 0,
      ...options,
    });
  });
}

export function watchPosition(success, error) {
  if (!navigator.geolocation) {
    return null;
  }

  return navigator.geolocation.watchPosition(success, error, {
    enableHighAccuracy: true,
    maximumAge: 5000,
    timeout: 10000,
  });
}

export function clearWatcher(id) {
  navigator.geolocation.clearWatch(id);
}
