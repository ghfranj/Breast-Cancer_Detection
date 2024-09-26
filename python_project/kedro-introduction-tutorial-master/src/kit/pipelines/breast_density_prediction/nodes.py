import torch
from PIL import Image
import numpy as np
import cv2
import json

from Tools.cleanMammogram import crop_borders_with_its_masks, remove_artefacts
from keras.models import load_model as load_cnn_model


def breast_density_input(img):
    img = np.asarray(img)
    img = crop_borders_with_its_masks(img)
    img = remove_artefacts(img, False)
    img = cv2.resize(img, (256,256))
    img = Image.fromarray(img)
    return img


def predict_breast_density(img):
    model = load_cnn_model('data/06_models/Breast_density_initial_0.950.5269886363636364.h5')
    print(model.summary())
    img = np.asarray(img)
    assert img.shape == (256,256)
    print('this is image shape', img.shape)
    breast_density = model.predict(np.asarray([img]))
    # print(model.summary())
    breast_density = breast_density.argmax(axis=1)[0]
    print(breast_density)
    json_data = {
        'breast_density': int(breast_density)+1
    }
    json_content = json.dumps(json_data)
    return json_content
